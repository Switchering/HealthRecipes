<?php
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use rmrevin\yii\fontawesome\FontAwesome;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>

        <?php $this->head() ?>
    </head>

    <body>
    <?php $this->beginBody() ?>
        <!-- HEADER -->
        <header id="header">
            <!-- NAV -->
            <div id="nav">
                <!-- Top Nav -->
                <div id="nav-top">
                    <div class="container">
                        <!-- social -->
                        <ul class="nav-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                        <!-- /social -->

                        <!-- logo -->
                        <div class="nav-logo">
                            <a href="/" class="logo"><img src="images/logo.jpg" alt=""></a>
                        </div>
                        <!-- /logo -->
                        <!-- search & aside toggle -->
                        <div class="nav-btns">
                            <button class="aside-btn"><i class="fa fa-bars"></i></button>
                            <button class="search-btn"><i class="fa fa-search"></i></button>
                            <div id="nav-search">
                                <form>
                                    <input class="input" name="search" placeholder="Enter your search...">
                                </form>
                                <button class="nav-close search-close">
                                    <span></span>
                                </button>
                            </div>
                        </div>
                        <!-- /search & aside toggle -->
                    </div>
                </div>
                <!-- /Top Nav -->
                <!-- Main Nav -->
                <div id="nav-bottom">
                    <div class="container">
                    <!-- nav -->
                        <ul class="nav-menu">
                            <li class="has-dropdown">
                                <a href="/">Главная</a>
                                    <div class="dropdown">
                                        <div class="dropdown-body">
                                            <ul class="dropdown-list">
                                                <li><a href="/site/categories">Категории</a></li>
                                                <li><a href="blog-post.html">Post page</a></li>
                                                <li><a href="about.html">О нас</a></li>
                                                <li><a href="contact.html">Contacts</a></li>
                                                <li><a href="blank.html">Regular</a></li>
                                            </ul>

                                        </div>
                                    </div>
                            </li>
                            <li><a href="#">Витамины</a></li>
                            <li><a href="#">Питание</a></li>
                        </ul>
                        <!-- /nav -->
                    </div>
                </div>
                <!-- /Main Nav -->
                <!-- Aside Nav -->
                <div id="nav-aside">
                    <ul class="nav-aside-menu">
                        <li><a href="index.html">Home</a></li>
                        <li class="has-dropdown"><a>Categories</a>
                            <ul class="dropdown">
                                <li><a href="#">Lifestyle</a></li>
                                <li><a href="#">Fashion</a></li>
                                <li><a href="#">Technology</a></li>
                                <li><a href="#">Travel</a></li>
                                <li><a href="#">Health</a></li>
                            </ul>
                        </li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="contact.html">Contacts</a></li>
                        <li><a href="#">Advertise</a></li>
                    </ul>
                    <button class="nav-close nav-aside-close"><span></span></button>
                </div>
                <!-- /Aside Nav -->
            </div>
        </header>
        <!-- End Header -->

        <?= $content?>

        <!-- Start Footer -->
        <footer id="footer">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <a href="index.html" class="logo"><img src="./img/logo-alt.png" alt=""></a>
                            </div>
                            <p>Nec feugiat nisl pretium fusce id velit ut tortor pretium. Nisl purus in mollis nunc sed. Nunc non blandit massa enim nec.</p>
                            <ul class="contact-social">
                                <li><a href="#" class="social-facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="social-twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="social-google-plus"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#" class="social-instagram"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                        <div class="col-md-3">
                            <div class="footer-widget">
                                <h3 class="footer-title">Categories</h3>
                                <div class="category-widget">
                                    <ul>
                                        <li><a href="#">Lifestyle <span>451</span></a></li>
                                        <li><a href="#">Fashion <span>230</span></a></li>
                                        <li><a href="#">Technology <span>40</span></a></li>
                                        <li><a href="#">Travel <span>38</span></a></li>
                                        <li><a href="#">Health <span>24</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="footer-widget">
                                <h3 class="footer-title">Tags</h3>
                                <div class="tags-widget">
                                    <ul>
                                        <li><a href="#">Social</a></li>
                                        <li><a href="#">Lifestyle</a></li>
                                        <li><a href="#">Blog</a></li>
                                        <li><a href="#">Travel</a></li>
                                        <li><a href="#">Technology</a></li>
                                        <li><a href="#">Fashion</a></li>
                                        <li><a href="#">Life</a></li>
                                        <li><a href="#">News</a></li>
                                        <li><a href="#">Magazine</a></li>
                                        <li><a href="#">Food</a></li>
                                        <li><a href="#">Health</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <div class="col-md-3">
                        <div class="footer-widget">
                            <h3 class="footer-title">Newsletter</h3>
                            <div class="newsletter-widget">
                                <form>
                                    <p>Nec feugiat nisl pretium fusce id velit ut tortor pretium.</p>
                                    <input class="input" name="newsletter" placeholder="Enter Your Email">
                                    <button class="primary-button">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /row -->

                <!-- row -->
                <div class="footer-bottom row">
                    <div class="col-md-6 col-md-push-6">
                        <ul class="footer-nav">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="contact.html">Contacts</a></li>
                            <li><a href="#">Advertise</a></li>
                            <li><a href="#">Privacy</a></li>
                        </ul>
                    </div>
                        <div class="col-md-6 col-md-pull-6">
                            <div class="footer-copyright">
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </div>
                        </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
	</footer>
	<!-- /FOOTER -->
    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
