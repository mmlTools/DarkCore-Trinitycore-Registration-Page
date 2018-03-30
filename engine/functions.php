<?php if (!defined("DARKCORECMS")) safe_redirect("");
//--Powered by DarkCoreCMS
//--Website: http://mmltools.com
//--Author: Max aka (Darksoke)

class Register{
    public $errors = array();
    public function __construct(&$username, &$email, &$password, &$repassword)
    {
        $this->register_user($username, $email, $password, $repassword);
    }
    private function connect(){
        global $configuration;
        $con = mysqli_connect($configuration['ipDB'], $configuration['userDB'], $configuration['passwordDB'], $configuration['authDB']);
        if (!$con) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        return $con;
    }
    private function register_user($username, $email, $password, $repassword){
        if ($password != $repassword)
            array_push($this->errors, "Passwords does not match");
        if($this->check_user_exist($username))
            array_push($this->errors, "Username is already in use");
        if($this->check_email_exist($email) || validate_email($email))
            array_push($this->errors, "The following email is already in use or is not valid");
        if(empty($this->errors)) {
            $password = encrypt($username, $password);
            $sql = "INSERT INTO `account` (`username`, `sha_pass_hash`, `email`) VALUES (?,?,?)";
            if ($stmt = $this->connect()->prepare($sql)) {
                $stmt->bind_param("sss", $username, $password, $email);
                $stmt->execute();
                $stmt->close();
                safe_redirect("?success={$username}");
            }
        }
    }
    private function check_user_exist($username){
        $sql = "SELECT * FROM account WHERE `username`=?";
        if ($stmt = $this->connect()->prepare($sql)) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result)
                return true;
        }
        return false;
    }
    function check_email_exist($email){
        $sql = "SELECT * FROM account WHERE `email`=?";
        if ($stmt = $this->connect()->prepare($sql)) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result)
                return true;
        }
        return false;
    }
}