<?php
if (!defined("DARKCORECMS")) safe_redirect("");
require_once "functions.php";
?>
<section id="banner">
    <div class="slide">
        <div id="first-slider">
            <div id="carousel-example-generic" class="carousel slide carousel-fade">
                <div class="carousel-inner" role="listbox">
                    <!-- Item 1 -->
                    <div class="item active slide1">
                        <div class="row">
                            <div class="container">
                                <!--<div class="col-md-4 text-right">
                                    <img data-animation="animated zoomInLeft delay-06s" src="" class="img-responsive">
                                </div>-->
                                <div class="col-md-8">
                                    <div class="block" data-animation="animated zoomInLeft delay-02s">
                                        <h1>DarkCore Registration Page Setup</h1>
                                        <h2>This will only take a minute, just complete the followiing form with the required data and your registration page will be fully set up and functional.</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-divider-up"></section>
<section id="registration-form" class="background-fixed setup">
    <div class="container">
        <div class="row">
            <div class="col-md-6 wow fadeInRight delay-02s">
                <form method='post'  autocomplete='off' enctype='multipart/form-data'>
                    <form method="post" enctype="multipart/form-data">
                        <?php if (isset($_POST['setup'])) install_website($_POST['title'], $_POST['realmlist'], $_POST['description'], $_POST['version'], $_POST['host'], $_POST['user'], $_POST['password'], $_POST['emulator'], $_POST['database']); ?>
                        <h3>Main Server Information</h3>
                        <input class='form-control' type="text" name="title" placeholder="Website Title" <?php if (isset($_POST['title'])) echo "value='".$_POST['title']."'"?> required>
                        <input class='form-control' type="text" name="realmlist" placeholder="Server Realmlist" <?php if (isset($_POST['realmlist'])) echo "value='".$_POST['realmlist']."'"?> required>
                        <textarea class="form-control" name="description" placeholder="Write down your server description" required><?php if (isset($_POST['description'])) echo $_POST['description']?></textarea>
                        <h3>Database Login Information</h3>
                        <input class='form-control' type="text" name="host" placeholder="Database Host(ip)" <?php if (isset($_POST['host'])) echo "value='".$_POST['host']."'"?> required>
                        <input class='form-control' type="text" name="user" placeholder="Database User" <?php if (isset($_POST['user'])) echo "value='".$_POST['user']."'"?> required>
                        <input class='form-control' type="text" name="password" placeholder="Database Password" <?php if (isset($_POST['password'])) echo "value='".$_POST['password']."'"?> required>
                        <input class='form-control' type="text" name="database" placeholder="Users Database Name" <?php if (isset($_POST['database'])) echo "value='".$_POST['database']."'"?> required>
                        <div class="form-group">
                            <label for="emulator">Emulator</label>
                            <select class="form-control" name="emulator" id="emulator" required>
                                <option value="1" selected>Trinitycore</option>
                                <option value="2" disabled>Mangos</option>
                                <option value="3" disabled>Sunwell Core</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="version">Game Version/Expansion</label>
                            <select class="form-control" name="version" id="version" required>
                                <option value="0" disabled>Vanilla</option>
                                <option value="1" disabled>Burning Crusade</option>
                                <option value="2" selected>Wrath of the Lich King</option>
                                <option value="3" disabled>Cataclysm</option>
                                <option value="4" disabled>Mists of Pandaria</option>
                                <option value="5" disabled>Warlords of Draenor</option>
                                <option value="6" disabled>Legion</option>
                                <option value="7" disabled>Battle for Azzeroth</option>
                            </select>
                        </div>
                        <button class="btn btn-default" type="submit" name="setup">Finish Setup</button>
                    </form>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="section-divider-down"></section>
