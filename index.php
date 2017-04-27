<?php if (file_exists("install.php")) echo "<script> window.location.href = 'install.php' </script>";
foreach (glob("engine/*.php") as $filename)
{
    include $filename;
}
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
    <meta name="description" content="<?php echo $description; ?>">
    <meta name="keywords" content="<?php echo $keywords; ?>">
    <link rel="stylesheet" type="text/css" href="style/main.css" title="Default Styles" media="screen">
    <title><?php echo $title ?> - <?php echo ucwords( str_ireplace(array('-', '.php'), array(' ', ''), basename($_SERVER['PHP_SELF']) ) )?> </title>
</head>
<body>
<?php
if (isset($_POST['go_back'])) { echo "<script type='text/javascript'>window.location.href = 'index.php';</script>"; }
if (isset($_GET['success'])){ ?>
    <div id="notification">
        Thank you for registering <?php echo $_GET['success']; ?> we hope you will enjoy our server and refer to your friends.
        <form method="post">
            <input class="button" type="submit" name="go_back" value='Go back to website'>
        </form>
    </div>
<?php } else { ?>
    <div id="content">
        <div id="c_header">
            <div class="c_title"><?php echo $title; ?></div>
        </div>
        <?php
        $first = rand(1,100);
        $second = rand(1,100);
        $checkout = $first + $second;
        if (isset($_POST['register'])) { ?>
            <div id="desc-line-err">
                <?php register_user(clean($_POST['username']), $_POST['email'], $_POST['password'], clean($_POST['re_password']), clean($_POST['humantest']), clean($_POST['robot']));?>
            </div>
        <?php } ?>
        <div class="middle">
            <h2>Register new account</h2>
            <h5 style="color: #34A2E4;">Set Realmlist <?php echo $realmlist; ?></h5>
            <form method='post'  autocomplete='off' enctype='multipart/form-data'>
                <!-- Setup for web browsers / this won't allow the autofill in this form -->
                <input style="display:none">
                <input type="password" style="display:none">
                <input type="hidden" value="<?php echo $checkout; ?>" name="robot">
                <!--Registration Info -->
                <input class="input" id="usr_username" type="text" name="username" placeholder="Username" onchange="set_sumbitusr()" required>
                <input class="input" type="email" name="email" placeholder="Email" required>
                <input class="input" type="password" name="password" placeholder="Password" required>
                <input class="input" type="password" name="re_password" placeholder="Repeat Password" required>
                <input class="input" style="width:200px;" type="text" name="humantest" placeholder="Write the answer" required><label class="robot"><?php echo $first; ?>+<?php echo $second; ?>=?</label>
                <input class="submit" id="regbutton" type="submit" name="register" value="Register">
            </form>
        </div>
        <div id="desc-line">
            <div class="description"><?php echo $description; ?></div>
        </div>
    </div>
    <div id="footer-line">
        <h5>
            Copyright &copy; 2016 by Maxim Marco ( <a href="http://mmltools.com">DarkCore / MMLTools</a> ) All rights reserved.
            No part of this project may be reproduced, distributed, or transmitted in any form or by any means.
        </h5>
    </div>
<script>
    function set_sumbitusr(){
        var text = document.getElementById("usr_username").value;
        document.getElementById("regbutton").value = "Register - "+text;
    }
</script>
<?php } ?>
</body>
</html>
