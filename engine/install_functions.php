<?php
function rem_install(){
    $testing = 0;
    if ($testing == 0) {
        unlink("engine/install_functions.php");
        unlink("style/install_main.css");
        unlink("install.php");
    }
    echo "<script> window.location.href = 'index.php' </script>";
}

function install_website($title, $description, $keywords, $realmlist, $db_ip, $db_user, $db_password, $db_re_password, $db_auth){
    if (check_pass($db_password,$db_re_password) == false)
        echo '<h5 style="color:#FF0000;">Passwords does not match</h5>';
    else {
        $cnf_file = fopen("engine/global_config.php", 'w');
        $txt = '<?php
    //--Powered by DarkCoreCMS
    //--Website: http://mmltools.com
    //--Author: Marco aka (Darksoke)

    ';
        $txt .= '$title = "' . $title . '"; //Your Website Title
    ';
        $txt .= '$description = "' . $description . '"; //Your Website Description
    ';
        $txt .= '$keywords = "' . $keywords . '"; //Your Website Keywords
    ';
        $txt .= '$realmlist = "' . $realmlist . '"; //Your Realmlist

    ';
        $txt .= '//Database Connection

    ';
        $txt .= '$db_ip = "' . $db_ip . '";
    ';
        $txt .= '$db_user = "' . $db_user . '";
    ';
        $txt .= '$db_password = "' . $db_password . '";
    ';
        $txt .= '$db_auth = "' . $db_auth . '";

    ?>';
        fwrite($cnf_file, $txt);
        fclose($cnf_file);
        echo "<script> window.location.href = 'index.php' </script>";
    }
}

function check_pass($pass,$re_pass){
    if ($pass == $re_pass)
        return true;
    return false;
}
?>