<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Tag;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'category_id')->dropDownList(
       \yii\helpers\ArrayHelper::map(\app\models\Category::find()->all(),'id', 'title')) ?>

    <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>
    <?php if($model->getImage() != null):?>
    <div class="form-group">
        <?= Html::img($model->getImage(),['width'=>200]) ?>
        <?= Html::a('Удалить изображение', ['delimage','id'=>$model->id], ['class' => 'btn btn-danger']) ?>
    </div>
    <?php endif;?>

    <?= Html::checkboxList('tags',$model->selectedTags, ArrayHelper::map(Tag::find()->all(), 'id', 'title'),['class'=>'form-control','multiple'=>true]) ?>

    <div class="form-group" style=margin-top:20px>
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Комментарии', ['comments','id'=>$model->id], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
