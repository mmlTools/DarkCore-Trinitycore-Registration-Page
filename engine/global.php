<?php if (!defined("DARKCORECMS")) safe_redirect("");
function safe_redirect($url = "", $act = "", $exit = true, $ignorebase = false)
{
    if(!$ignorebase)
        $url = basepath()."$url";

    $redirector = "<script type='text/javascript'>";

    switch($act){
        case 'window':
            $redirector .= "window.open('".$url."','_blank');";
            break;
        default:
            $redirector .= "window.location.href = '".$url."';";
            break;
    }

    $redirector .= "</script>";

    echo $redirector;

    if ($exit) exit;
}
function validate_email($email){
    if (strlen($email) > 50 || strpos($email, '@') === false){
        return false;
    }
    else
        return filter_var($email, FILTER_VALIDATE_EMAIL);
}
function encrypt($encr_val, $encr_string)
{
    $encrypted = sha1(strtoupper($encr_val) . ":" . strtoupper($encr_string));
    $encrypted = strtoupper($encrypted);
    return $encrypted;
}
function basepath(){
    global $configuration;
    if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    }
    else{
        $protocol = 'http';
    }
    $debug = true;
    if ($debug)
        $path = "127.0.0.1/websites/tcore/";
    else
        $path = $configuration['basepath'];

    return "{$protocol}://".$path;
}