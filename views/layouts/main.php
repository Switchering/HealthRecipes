<?php
use yii\app;
use yii\helpers\Html;
use app\assets\AppAsset;
use yii\helpers\Url;
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/ico', 'href' => Url::to(['images/favicon.ico'])]);
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
        <header>
            <!-- NAV -->
            <div id="nav">
                <!-- Top Nav -->
                <div id="nav-top">
                    <div class="container">
                        <!-- social -->
                        <ul class="nav-social">
                            <li><a href="https://vk.com/vkhealthrecipes"><i class="fa fa-vk"></i></a></li>
<!--                            <li><a href="#"><i class="fa fa-telegram"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>-->
                        </ul>
                        <!-- /social -->

                        <!-- logo -->
                        <div class="nav-logo">
                            <a href="/" class="logo"><img src="/images/logo.png" alt=""></a>
                        </div>
                        <!-- /logo -->
                        <!-- search & aside toggle -->
                        <div class="nav-btns">
                            <button class="aside-btn"><i class="fa fa-bars"></i></button>
<!--                            <button class="search-btn"><i class="fa fa-search"></i></button>
                            <div id="nav-search">
                                <form>
                                    <input class="input" name="search" placeholder="Enter your search...">
                                </form>
                                <button class="nav-close search-close">
                                    <span></span>
                                </button>
                            </div>-->
                            <?php if(Yii::$app->user->isGuest):?>
                            <a class="signin-button" href="<?= Url::toRoute(['auth/login'])?>">Вход</a>
                            /
                            <a class="signin-button" href="<?= Url::toRoute(['auth/signup'])?>">Регистрация</a>
                            <?php else: ?>
                            <a class="signin-button" href="<?= Url::toRoute(['auth/logout'])?>">Выход (<?=Yii::$app->user->identity->name ?>)</a>
                            <?php endif;?>
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
                                                <li><a href="/site/posts">Посты</a></li>
                                                <!--<li><a href="/site/about">О нас</a></li>-->
                                            </ul>

                                        </div>
                                    </div>
                            </li>
                            <?php foreach ($this->params['categories'] as $category):?>
                            <li><a href="<?= Url::toRoute(['site/category','id'=>$category->id])?>"><?= $category->title?></a></li>
                            <?php endforeach;?>
                        </ul>
                        <!-- /nav -->
                    </div>
                </div>
                <!-- /Main Nav -->
                <!-- Aside Nav -->
                <div id="nav-aside">
                    <ul class="nav-aside-menu">
                        <li><a href="/">Главная</a></li>
                        <li><a href="site/posts">Посты</a></li>
                        <li class="has-dropdown"><a>Категории</a>
                            <ul class="dropdown">
                                <li><a href="site/categories">Все</a></li>
                                <?php foreach ($this->params['categories'] as $category):?>
                                    <li><a href="<?= Url::toRoute(['site/category','id'=>$category->id])?>"><?= $category->title?></a></li>
                                <?php endforeach;?>
                            </ul>
                        </li>
                        <?php if(Yii::$app->user->identity->isAdmin):?>
                        <li><a href="/admin/">Панель администратора</a></li>
                        <?php endif;?>
                        <!--<li><a href="about.html">О нас</a></li>-->
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
                                <a href="index.html" class="logo"><img src="/images/logo-alt.png" alt=""></a>
                            </div>
                            <p>Начни жить с <span style="font-weight:600; color:#7FFF00">зелёного</span> листа.</p>
                            <ul class="contact-social">
                                <li><a href="https://vk.com/vkhealthrecipes" class="social-vk"><i class="fa fa-vk"></i></a></li>
<!--                                <li><a href="#" class="social-telegram"><i class="fa fa-telegram"></i></a></li>
                                <li><a href="#" class="social-instagram"><i class="fa fa-instagram"></i></a></li>-->
                            </ul>
                        </div>
                    </div>
                        <div class="col-md-3">
                            <div class="footer-widget">
                                <h3 class="footer-title">Категории</h3>
                                <div class="category-widget">
                                    <ul>
                                        <?php foreach ($this->params['categories'] as $category):?>
                                        <li><a href="<?= Url::toRoute(['site/category','id'=>$category->id])?>"><?= $category->title?><span><?= $category->getArticlesCount();?></span></a></li>
                                        <?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="footer-widget">
                                <h3 class="footer-title">Тэги</h3>
                                <div class="tags-widget">
                                    <ul>
                                        <?php foreach ($this->params['tags'] as $tag):?>
                                        <li><a href="<?= Url::toRoute(['site/tag','id'=>$tag->id])?>"><?= $tag->title?></a></li>
                                        <?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <div class="col-md-3">
                        <div class="footer-widget">
                            <h3 class="footer-title">Подписка</h3>
                            <div class="newsletter-widget">
                                <form action="/site/makesub">
                                    <p>Чтобы не пропускать новые посты, подпишитесь на нашу рассылку:</p>
                                    <input class="input" name="email" placeholder="Введите Ваш Email">
                                    <button class="submitButton primary-button" href>Подписаться</button>
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
                            <li><a href="/">Главная</a></li>
                            <li><a href="/site/about">О нас</a></li>
                        </ul>
                    </div>
                        <div class="col-md-6 col-md-pull-6">
                            <div class="footer-copyright">
                                &copy;<script>document.write(new Date().getFullYear());</script> HealthRecipes.ru, Все права защищены
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
