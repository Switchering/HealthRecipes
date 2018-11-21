<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="section">
    <!-- container -->
    <div class="container">
            <div class="col-md-10">
                
                <h1><?= Html::encode($this->title) ?></h1>
                <p>Пожалуйста заполните поля:</p>
                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'layout' => 'horizontal',
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                        'labelOptions' => ['class' => 'col-lg-1 control-label'],
                    ],
                ]); ?>

                    <?= $form->field($model, 'email')->textInput(['autofocus' => true])?>
                    <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>
                    <?= $form->field($model, 'rememberMe')->checkbox([
                        'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                    ])->label('Запомнить меня')?>
                <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-11">
                        <?= Html::submitButton('Войти', ['class' => 'primary-button', 'name' => 'login-button']) ?>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
            <div class="col-md-2">
            <script type="text/javascript" src="https://vk.com/js/api/openapi.js?159"></script>
            <script type="text/javascript">VK.init({apiId: 6748665});</script>
                <!-- VK Widget -->
                <div id="vk_auth"></div>
                <script type="text/javascript">
                    VK.Widgets.Auth("vk_auth", {"authUrl":"/auth/login-vk"});
                </script>
            </div>
    </div>
</div>
