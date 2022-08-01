<?php
session_start();
// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['role'] == "") {
    header("location:sign-in.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Businnes, Portfolio, Corporate">
    <meta name="Author" content="WebThemez">
    <title>Zee Auto Part</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../elegant_font/style.css" />
    <!--[if lte IE 7]><script src="elegant_font/lte-ie7.js"></script><![endif]-->
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/slider-pro.css">
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/owl.theme.css">
    <link rel="stylesheet" href="../css/owl.transitions.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../elegant_font/style.css">
    <link rel="stylesheet" href="../css/style.css">

    <!--[if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
        <script type="text/javascript" src="js/selectivizr.js"></script>
    <![endif]-->
</head>

<body>
    <!-- Header End -->
    <header>
        <!-- Navigation Menu start-->

        <nav id="topNav" class="navbar navbar-default main-menu">
            <div class="container">
                <button class="navbar-toggler hidden-md-up pull-right" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
                    ☰
                </button>
                <a class="navbar-brand page-scroll" href="#slider"><img class="logo" id="logo" src="../images/test-01.png" alt="logo"></a>
                <div class="collapse navbar-toggleable-sm" id="collapsingNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="#slider">HOME</a>
                        </li>
                        <li>
                            <a href="#services">AUTO PART</a>
                        </li>
                        <li>
                            <a href="logout.php">LOGOUT</a>
                        </li>
                        <!-- <li>
                            <a href="#portfolio">GALLERY</a>
                        </li> 
                        <li>
                            <a href="#team">CHEFS</a>
                        </li>
						 <li>
                            <a href="#clients">FEEDBACK</a>
                        </li>
                        <li>
                            <a href="#contact">CONTACT US</a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>


    </header>
    <!-- Header End -->


    <section class="slider-pro slider" id="slider">
        <div class="sp-slides">

            <!-- Slides -->
            <div class="sp-slide main-slides">
                <div class="img-overlay"></div>
                <img class="sp-image" src="../images/slider/motor tr.jpg" alt="Slider 2" />
                <h1 class="sp-layer slider-text-big" data-position="center" data-show-transition="left" data-hide-transition="right" data-vertical="55%" data-show-delay="1500" data-hide-delay="200">
                    <span class="highlight-texts">MODIFICATION</span>
                </h1>
            </div>
            <!-- Slides End -->

            <!-- Slides -->
            <div class="sp-slide main-slides">
                <div class="img-overlay"></div>
                <img class="sp-image" src="../images/slider/slider-img-2.jpg" alt="Slider 1" />
                <h1 class="sp-layer slider-text-big" data-position="center" data-show-transition="left" data-hide-transition="right" data-vertical="55%" data-show-delay="1500" data-hide-delay="200">
                    <span class="highlight-texts">DENTING & PAINTING</span>
                </h1>
            </div>
            <!-- Slides End -->


            <!-- Slides -->
            <div class="sp-slide main-slides">
                <div class="img-overlay"></div>
                <img class="sp-image" src="../images/slider/slider-img-3.jpg" alt="Slider 3" />
                <h1 class="sp-layer slider-text-big" data-position="center" data-show-transition="left" data-hide-transition="right" data-vertical="55%" data-show-delay="1500" data-hide-delay="200">
                    <span class="highlight-texts">MAINTENANCE & REPAIR</span>
                </h1>
            </div>
            <!-- Slides End -->

        </div>
    </section>
    <!-- Main Slider End -->

    <section id="services" class="section-wrapper">
        <div class="container">
            <div class="row">

                <!-- Section Header -->
                <div class="col-md-12 col-sm-12 col-xs-12 section-header wow fadeInDown">
                    <h2><span class="highlight-text">Zee Auto Part</span></h2>
                    Zee Auto Part menyediakan berbagai kebutuhan spare part motor anda dengan kualitas terbaik.
                    <p class="col-md-8 col-sm-10 col-xs-12 col-md-offset-2 col-sm-offset-1">


                    </p>
                </div>
                <!-- Section Header End -->

                <div class="our-services">


                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12 text-xs-center wow fadeInDown" data-wow-delay=".2s">

                            <div class="service-box">
                                <img src="../images/01.jpg" alt="Custom Image">
                                <div class="icon">
                                    <h3>Oli</h3>
                                </div>
                                <p><a href="../product.php">Show </a></p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 text-xs-center wow fadeInDown" data-wow-delay=".2s">
                            <div class="service-box">
                                <img src="../images/02.jpg" alt="Custom Image">
                                <div class="icon">
                                    <h3>Shockbreaker</h3>
                                </div>

                                <p><a href="logout.php">BELIEN </a></p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 text-xs-center wow fadeInDown" data-wow-delay=".2s">
                            <div class="service-box">
                                <img src="../images/03.jpg" alt="Custom Image">
                                <div class="icon">
                                    <h3>Aki</h3>
                                </div>

                                <p><a href="logout.php">BELIEN </a></p>
                            </div>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-md-4 col-sm-4 col-xs-12 text-xs-center wow fadeInDown" data-wow-delay=".2s">
                            <div class="service-box">
                                <img src="../images/04.jpg" alt="Custom Image">
                                <div class="icon">
                                    <h3>Accessories</h3>
                                </div>

                                <p><a href="logout.php">BELIEN </a></p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 text-xs-center wow fadeInDown" data-wow-delay=".2s">
                            <div class="service-box">
                                <img src="../images/05.jpg" alt="Custom Image">
                                <div class="icon">
                                    <h3>Piston</h3>
                                </div>

                                <p><a href="logout.php">BELIEN </a></p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 text-xs-center wow fadeInDown" data-wow-delay=".2s">
                            <div class="service-box">
                                <img src="../images/06.jpg" alt="Custom Image">
                                <div class="icon">
                                    <h3>Brake Shoe & Pad Set</h3>
                                </div>

                                <p><a href="logout.php">BELIEN </a></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>






    <!-- Contact Section End -->
    <section class="footer-container">
        <div class="container">
            <div class="row footer-containertent">
                <div class="col-md-4">
                    <img src="images/logo.png" alt="">
                    <p></p>
                </div>
                <div class="col-md-4">
                    <h4>News & Updates</h4>
                    <p></p>
                </div>
                <div class="col-md-4 contac-us">
                    <h4>Contact Us</h4>
                    <p></p>
                    <ul>
                        <li><i class="fa fa-home"></i>Madiun </li>
                        <li><i class="fa fa-phone"></i>0812 3418 9999</li>
                        <li><i class="fa fa-envelope-o"></i>zeeautopart@gmail.com</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <footer>

        <!-- <div class="container">
            <div class="row">
                <div class="footer-containertent">

                    <ul class="footer-social-info">
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                        </li>
                    </ul>
                    <br /><br /> -->
        <!-- <p>Copyright © 2018. <a href="https://webthemez.com/tag/free" target="_blank">Free HTML Templates</a> by WebThemez.com. All rights reserved</p> -->
        <!-- </div>
        </div>
        </div> -->
    </footer>
    <!-- Footer End -->

    <script src="../js/jquery-1.11.3.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/modernizr.min.js"></script>
    <script src="../js/jquery.easing.1.3.js"></script>
    <script src="../js/jquery.scrollUp.min.js"></script>
    <script src="../js/jquery.easypiechart.js"></script>
    <script src="../js/isotope.pkgd.min.js"></script>
    <script src="../js/jquery.fitvids.js"></script>
    <script src="../js/jquery.stellar.min.js"></script>
    <script src="../js/jquery.waypoints.min.js"></script>
    <script src="../js/wow.min.js"></script>
    <script src="../js/jquery.nav.js"></script>
    <script src="../js/imagesloaded.pkgd.min.js"></script>
    <script src="../js/smooth-scroll.min.js"></script>
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/jquery.sliderPro.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../contact/jqBootstrapValidation.js"></script>
    <script src="c../ontact/contact_me.js"></script>
    <script src="../js/custom.js"></script>

</body>

</html>