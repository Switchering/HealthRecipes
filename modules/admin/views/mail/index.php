<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Рассылка';
$this->params['breadcrumbs'][] = $this->title;
?>

    <?php $this->beginContent('@app/modules/admin/views/mail/layouts/preview-mail.php',[
      'articles'=>$articles,
      'categories'=>$categories
    ]); ?>
    <!-- тут появится содержимое включенного шаблона -->
    <?php $this->endContent(); ?>
