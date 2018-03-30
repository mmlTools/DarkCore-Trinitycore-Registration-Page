<!--
Powered by DarkCoreCMS
Website: http://mmltools.com
Author: Max aka (Darksoke)
-->
<?php define("DARKCORECMS", "TRUE");
require_once "engine/global.php";
if(file_exists("engine/configuration.php"))
    require_once "engine/configuration.php";
require_once "engine/functions.php";
echo '<!DOCTYPE html>';
echo '<html lang="en">';
echo '<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->';
echo '<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->';
echo '<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->';
echo '<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->';

include "inc/header.php";
echo "<body>";
if(!file_exists("engine/configuration.php"))
    include "inc/install/index.php";
else
    include "inc/registration_form.php";
include "inc/footer.php";
echo "</body>";
echo "</html>";


