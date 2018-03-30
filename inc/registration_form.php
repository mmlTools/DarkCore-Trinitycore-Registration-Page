<?php if (!defined("DARKCORECMS")) safe_redirect(""); ?>
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
                                        <h1>Welcome to <?php echo $configuration['title'] ?> </h1>
                                        <h3>Set Realmlist <?php echo $configuration['realmlist'] ?></h3>
                                        <h2><?php echo $configuration['description'] ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Wrapper for slides-->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <i class="fa fa-angle-left"></i><span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <i class="fa fa-angle-right"></i><span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="section-divider-up"></section>
<section id="registration-form">
    <div class="container">
        <div class="row">
            <div class="title">
                <h2>Register now</h2>
                <p style="color: #eae5e4;">And take part to a great adventure</p>
            </div>
            <div class="col-md-6 wow fadeInRight delay-02s">
                <?php
                if (isset($_POST['register'])){
                    $eng_register = new Register($_POST['username'], $_POST['email'], $_POST['password'], $_POST['repassword']);
                    if(!empty($eng_register->errors))
                        foreach($eng_register->errors as $error)
                            echo "<div class=\"alert alert-danger alert-dismissible\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Error!</strong> {$error}</div>";
                }
                ?>
                <form method="post" enctype="multipart/form-data">
                    <input class='form-control' type="text" name="username" placeholder="Username" <?php if (isset($_POST['username'])) echo "value='".$_POST['username']."'"?> required>

                    <input class='form-control' type="email" name="email" placeholder="Email" <?php if (isset($_POST['email'])) echo "value='".$_POST['email']."'"?> required>

                    <input class='form-control' type="password" name="password" placeholder="Password" required>

                    <input class='form-control' type="password" name="repassword" placeholder="Confirm Password" required>

                    <button class="btn btn-default" type="submit" name="register">Register</button>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="section-divider-down"></section>