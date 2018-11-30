<?php
use yii\bootstrap\Nav;
use yii\helpers\Url;

?>
<aside class="left-side sidebar-offcanvas">
    <section class="sidebar">

        <?php if (!Yii::$app->user->isGuest) : ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?= Yii::$app->user->identity->photo?>" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p>Привет,<?= Yii::$app->user->identity->name?> </p>
                    <a href="<?= $directoryAsset ?>/#">
                        <i class="fa fa-circle text-success"></i> Online
                    </a>
                </div>
            </div>
        <?php endif ?>

        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i
                    class="fa fa-search"></i></button>
                </span>
            </div>
        </form>

        <?=
        Nav::widget(
            [
                'encodeLabels' => false,
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => '<span class="fa fa-angle-down"></span><span class="text-info">Menu Yii2</span>',
                        'url' => '#'
                    ],
                    ['label' => '<span class="fa fa-file-code-o"></span> Gii', 'url' => ['/gii']],
                    ['label' => '<span class="fa fa-dashboard"></span> Debug', 'url' => ['/debug']],
                ],
            ]
        );
        ?>

        <!-- You can delete next ul.sidebar-menu. It's just demo. -->

        <ul class="sidebar-menu">
            <li>
                <a href="/admin/" class="navbar-link">
                    <i class="fa fa-angle-down"></i> <span class="text-info">Модули:</span>
                </a>
            </li>
            <li>
                <a href="/admin/article/index">
                    <i class="fa fa-leanpub"></i> <span>Статьи</span>
                </a>
            </li>
            <li>
                <a href="/admin/category/index">
                    <i class="fa fa-folder"></i> <span>Категории</span>
                </a>
            </li>
            <li>
                <a href="/admin/comment/index">
                    <i class="fa fa-comment"></i>
                    <span>Комментарии</span>
                </a>
            </li>
            <li>
                <a href="/admin/tag/index">
                    <i class="fa fa-tags"></i>
                    <span>Тэги</span>
                </a>
            </li>
            <li>
                <a href="/admin/mail/index">
                    <i class="fa fa-comment"></i>
                    <span>Рассылка</span>
                </a>
            </li>
            <li>
                <a href="<?= $directoryAsset ?>/pages/calendar.html">
                    <i class="fa fa-calendar"></i> <span>Календарь</span>
                    <small class="badge pull-right bg-red">0</small>
                </a>
            </li>
            <li>
                <a href="<?= $directoryAsset ?>/pages/mailbox.html">
                    <i class="fa fa-envelope"></i> <span>Почта</span>
                    <small class="badge pull-right bg-yellow">0</small>
                </a>
            </li>
        </ul>

    </section>

</aside>
