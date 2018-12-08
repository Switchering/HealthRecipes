<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>
    <?php if($model->image != null):?>
    <div class="form-group">
        <?= Html::img($model->getImage(),['width'=>200]) ?>
        <?= Html::a('Удалить изображение', ['delimage','id'=>$model->id], ['class' => 'btn btn-danger']) ?>
    </div>
    <?php endif;?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
