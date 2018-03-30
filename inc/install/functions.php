<?php if (!defined("DARKCORECMS")) safe_redirect("");

function install_website($title, $realmlist, $description, $gameVersion, $db_ip, $db_user, $db_password, $emulator, $db_auth){

        $cnf_file = fopen("engine/configuration.php", 'w');
        $txt = "<!--
Powered by DarkCoreCMS
Website: http://mmltools.com
Author: Max aka (Darksoke)
-->
<?php if (!defined(\"DARKCORECMS\")) safe_redirect(\"\");
        
\$configuration['title'] = \"{$title}\";
\$configuration['description'] = \"{$description}\";
\$configuration['ipDB'] = \"{$db_ip}\";
\$configuration['authDB'] = \"{$db_auth}\";
\$configuration['userDB'] = \"{$db_user}\";
\$configuration['passwordDB'] = \"$db_password\";
\$configuration['emulator'] = {$emulator};
\$configuration['gameVersion'] = {$gameVersion};
\$configuration['realmlist'] = \"{$realmlist}\";"
        ;
        fwrite($cnf_file, $txt);
        fclose($cnf_file);
        safe_redirect("");
}
