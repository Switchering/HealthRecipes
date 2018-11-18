<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>
$this->title = $model->title;
<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::checkboxList('tags',$selectedTags, $tags,['class'=>'form-control','multiple'=>true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Выбрать', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
