<?php
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\PublicAsset;
use yii\helpers\Url;

PublicAsset::register($this);
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

    <body class="home blog">
    <?php $this->beginBody() ?>
        <!-- Start Header -->
        <div class="container zerogrid">
            <div class="col-full">
                <div class="wrap-col">
                    <div id="header-nav-container">
                        <a href="/"><img src="public/images/logo2.png" id="logo" /></a>
                        <!-- Navigation Menu -->
                        <ul class="sf-menu">
                            <li class="menu-item current-menu-item"><a href="/">Главная</a></li>
                            <li class="menu-item"><a href="/site/categories">Категории</a></li>
                            <li class="menu-item"><a href="#">Features</a>
                            <ul class="sub-menu">
                                <li class="menu-item"><a href="#">Menu 01</a></li>
                                <li class="menu-item"><a href="#">Menu 02</a></li>
                                <li class="menu-item"><a href="#">Menu 03</a></li>                                
                            </ul>
                            </li>
                            <li class="menu-item"><a href="about.html">About us</a></li>
                            <?php if(Yii::$app->user->isGuest):?>
                            <li class="menu-item"><a href="<?= Url::toRoute(['auth/login'])?>">Вход</a></li>
                            <li class="menu-item"><a href="<?= Url::toRoute(['auth/signup'])?>">Регистрация</a></li>
                            <?php else: ?>
                            <li class="menu-item"><a href="<?= Url::toRoute(['auth/logout'])?>">Выход (<?=Yii::$app->user->identity->name ?>)</a>
                            
                            </li>
                            <?php endif;?>
                        </ul>	
                        <!-- End Navigation Menu -->
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="clear"></div> 
        </div>
        <div class="spacing-30"></div>
        <!-- End Header -->
        
        <?= $content?>
        
        <!-- Start Footer -->
        <div class="spacing-30"></div>
        <div class="container zerogrid">
            <div id="footer-container" class="col-full">
                <div class="wrap-col">	
                    <!-- Footer Copyright -->
                    <p>Copyrigh &copy; 2014 <a href="http://bayguzin.ru/">Bayguzin.ru</a> All Rights Reserved.</p>
                    <!-- End Footer Copyright -->

                    <!-- Footer Logo -->
                                <img src="public/images/footer-logo.png" id="footer-logo" />
                    <!-- End Footer Logo -->

                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <!-- End Footer -->
    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
