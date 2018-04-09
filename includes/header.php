<?php include "admin/class/Ems.class.php";
$db = new Ems();
?>
<html>
<head>
    <title>EventzLab GH</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font.css">
    <link rel="stylesheet" type="text/css" href="assets/css/li-scroller.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.css">
    <link rel="stylesheet" type="text/css" href="assets/css/theme.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
    <header id="header">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="header_bottom">
                    <div class="logo_area"><a href="index.php" class="logo"><img src="images/logo.jpg" alt=""></a></div>
                    <div class="add_banner"><a href="#"><img src="images/addbanner_728x90_V1.jpg" alt=""></a></div>
                </div>
            </div>
        </div>
    </header>
    <section id="navArea">
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav main_nav">
                    <li class="active"><a href="index.php"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
                    <li><a href="#">Events</a></li>
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Entertainment</a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Music</a></li>
                            <li><a href="#">Music Videos</a></li>
                            <li><a href="#">Funny Vids</a></li>
                        </ul>
                    </li>
                    <li><a href="#">News</a></li>
                    <li><a href="#">Others</a></li>
                </ul>
            </div>
        </nav>
    </section>
    <section id="newsSection">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="latest_newsarea"> <span>Trending Posts</span>
                    <ul id="ticker01" class="news_sticker">
                        <li><a href="#"><img src="images/news_thumbnail3.jpg" alt="">My First News Item</a></li>
                        <li><a href="#"><img src="images/news_thumbnail3.jpg" alt="">My Second News Item</a></li>
                        <li><a href="#"><img src="images/news_thumbnail3.jpg" alt="">My Third News Item</a></li>
                        <li><a href="#"><img src="images/news_thumbnail3.jpg" alt="">My Four News Item</a></li>
                        <li><a href="#"><img src="images/news_thumbnail3.jpg" alt="">My Five News Item</a></li>
                        <li><a href="#"><img src="images/news_thumbnail3.jpg" alt="">My Six News Item</a></li>
                        <li><a href="#"><img src="images/news_thumbnail3.jpg" alt="">My Seven News Item</a></li>
                        <li><a href="#"><img src="images/news_thumbnail3.jpg" alt="">My Eight News Item</a></li>
                        <li><a href="#"><img src="images/news_thumbnail2.jpg" alt="">My Nine News Item</a></li>
                    </ul>
                    <div class="social_area"><span>Check Us</span>
                        <ul class="social_nav">
                            <li class="facebook"><a href="#"></a></li>
                            <li class="twitter"><a href="#"></a></li>
                            <li class="flickr"><a href="#"></a></li>
                            <li class="facebook"><a href="#"></a></li>
                            <li class="twitter"><a href="#"></a></li>
                            <li class="youtube"><a href="#"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="sliderSection">
        <div class="row">



