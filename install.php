<?php foreach (glob("engine/*.php") as $filename)
{
    include $filename;
}
if (isset($_POST['rem_install'])) { rem_install(); }
?>
<!--
Powered by DarkCoreCMS
Website: http://mmltools.com
Author: Marco aka (Darksoke)
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

</body>
</html>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style/install_main.css" title="Default Styles" media="screen">
        <title>DarkCore - <?php echo ucwords( str_ireplace(array('-', '.php'), array(' ', ''), basename($_SERVER['PHP_SELF']) ) )?> </title>
    </head>
<body>
<?php if (file_exists("engine/global_config.php")) { ?>
    <div id="notification">
        Your website was succesfully setup remove the installation file "install.php"
        <form method="post">
            <input class="delete" type="submit" name="rem_install" value='Delete "install.php" automatically'>
        </form>
    </div>
<?php } else { ?>
    <div id="install-content">
        <div id="install-header">
            <h2>Trinitycore Registration Page Setup</h2>
            <h5>The following informations can be changed later in the newly created file "engine/global_config.php"</h5>
            <?php if (isset($_POST['generate'])){ install_website($_POST['Title'],$_POST['Description'],$_POST['Keywords'], $_POST['Realmlist'], $_POST['db_ip'], $_POST['db_user'], $_POST['db_password'], $_POST['re_db_password'], $_POST['db_auth']); } ?>
        </div>
        <form method='post'  autocomplete='off' enctype='multipart/form-data'>
            <h3>Main Website Informations</h3>
            <!--Website Title-->
            <div id="line">
                <div class="text_lbl">
                    <div class="title">Website Title:</div>
                    <div class="desc">Your website name ex: Gaming Zeta</div>
                </div>
                <input class="input" type="text" name="Title" placeholder="ex: Gaming Zeta" required>
            </div>
            <!--Website Description-->
            <div id="line">
                <div class="text_lbl">
                    <div class="title">Website Description:</div>
                    <div class="desc">Your website/server description will be used for google indexing please keep it under 255 characters</div>
                </div>
                <textarea class="textarea" name="Description" maxlength="255"></textarea>
            </div>
            <!--Website Keywords-->
            <div id="line">
                <div class="text_lbl">
                    <div class="title">Website Keywords:</div>
                    <div class="desc">Keywords for google index you can use up to 160 characters please put "," after each word</div>
                </div>
                <textarea class="textarea" name="Keywords" maxlength="160"></textarea>
            </div>
            <!--Server Realmlist-->
            <div id="line">
                <div class="text_lbl">
                    <div class="title">Server Realmlist:</div>
                    <div class="desc">Your server realmlist ex: logon.gamingzeta.com</div>
                </div>
                <input class="input" type="text" name="Realmlist" placeholder="ex: logon.gamingzeta.com" required>
            </div>
            <h3>Database Informations</h3>
            <!-- Setup for web browsers / this won't allow the autofill in this form -->
            <input style="display:none">
            <input type="password" style="display:none">

            <!--Database Informations -->
            <div id="line">
                <div class="text_lbl">
                    <div class="title">Database IP/Host:</div>
                    <div class="desc">Your server database Host or IP this is required for new users registration</div>
                </div>
                <input class="input" type="text" name="db_ip" placeholder="Host ex: 127.0.0.1" required>
            </div>
            <div id="line">
                <div class="text_lbl">
                    <div class="title">Database Username:</div>
                    <div class="desc">The username used to connect to the given database host ex: Root</div>
                </div>
                <input class="input" type="text" name="db_user" placeholder="Username ex: root" required>
            </div>
            <div id="line">
                <div class="text_lbl">
                    <div class="title">Database Password:</div>
                    <div class="desc">Password used to connect to the given database and corespond to the given user </div>
                </div>
                <input class="input" type="password" name="db_password" placeholder="Password" required>
            </div>
            <div id="line">
                <div class="text_lbl">
                    <div class="title">Repeat Password:</div>
                    <div class="desc">Repeat password make sure the passwords match</div>
                </div>
                <input class="input" type="password" name="re_db_password" placeholder="Repeat Password" required>
            </div>
            <div id="line">
                <div class="text_lbl">
                    <div class="title">Auth Database Name:</div>
                    <div class="desc">Name of your database where all accounts are stored ex: auth, auth_db. Note! On linux OS is important to keep track of upcase/downcase</div>
                </div>
                <input class="input" type="text" name="db_auth" placeholder="Accounts Database ex: auth" required>
            </div>
            <input class="submit" type="submit" name="generate" value="Generate Configuration File">
        </form>
        <div id="install-footer">
            <h5>
                Copyright &copy; 2016 by Maxim Marco ( <a href="http://mmltools.com">DarkCore / MMLTools</a> ) All rights reserved.
                No part of this project may be reproduced, distributed, or transmitted in any form or by any means.
            </h5>
        </div>
    </div>
    </body>
    </html>
<?php } ?>