<?php
use \app\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\models\Comment;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<header class="header">
  <?= Html::a(Yii::$app->name, Yii::$app->homeUrl, ['class' => 'logo']) ?>
  <nav class="navbar navbar-static-top" role="navigation">
    <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>

    <div class="navbar-right">
      <ul class="nav navbar-nav">
        <li class="dropdown messages-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-comment"></i>
              <span class="label label-success"><?=(count(Yii::$app->params['comments']))?></span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">Не обработаны <?=(count(Yii::$app->params['comments']))?> комментария</li>
            <li>
              <ul class="menu">
              <!-- start message -->
                <?php foreach(Yii::$app->params['comments'] as $comment):?>
                <li>
                  <a href="#">
                    <div class="pull-left">
                      <img src=<?=$comment->user->photo?> class="img-circle" alt="User Image"/>
                    </div>
                    <h4>
                      <?= $comment->user->name?>
                      <!-- <small><i class="fa fa-clock-o"></i> 5 mins</small> -->
                    </h4>
                    <p><?= $comment->text?></p>
                  </a>
                </li>
                <?php endforeach;?>
                <!-- end message -->
                </ul>
            </li>
            <li class="footer"><a href="/admin/comment/">Посомтреть все комментарии</a></li>
          </ul>
        </li>
        <?php if(Yii::$app->user->isGuest):?>
            <li class="footer">
                <?= Html::a('Login', ['/site/login']) ?>
            </li>
        <?php else:?>
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i>
                    <span> <i class="caret"></i></span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header bg-light-blue">
                        <img src="<?= Yii::$app->user->identity->photo?>" class="img-circle" alt="User Image"/>
                        <p>
                          <?= Yii::$app->user->identity->name?>
                        </br>Разработчик
                            <!-- <small>Member since Nov. 2012</small> -->
                        </p>
                    </li>
                    <!-- Menu Body -->
                    <!-- <li class="user-body">
                        <div class="col-xs-4 text-center">
                            <a href="#">Followers</a>
                        </div>
                        <div class="col-xs-4 text-center">
                            <a href="#">Sales</a>
                        </div>
                        <div class="col-xs-4 text-center">
                            <a href="#">Friends</a>
                        </div>
                    </li> -->
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="#" class="btn btn-default btn-flat">Профиль</a>
                        </div>
                        <div class="pull-right">
                            <?= Html::a(
                                    'Выйти',
                                    ['/site/logout'],
                                    ['data-method' => 'post','class'=>'btn btn-default btn-flat']
                                ) ?>
                        </div>
                    </li>
                </ul>
            </li>
          <?php endif;?>
        <!-- User Account: style can be found in dropdown.less -->
      </ul>
    </div>
  </nav>
</header>
