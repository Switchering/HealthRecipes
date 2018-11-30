<?php
use yii\bootstrap\Carousel;
use yii\helpers\Url;
?>

<?php

$carousel = [];

foreach ($recent as $article)
{
    $image = $article->getImage();
    $carousel [] = [
        'content' => '<img src="'.$image.'"/>',
        'caption' => '<h1>'.$article->title.'</h1><p>'.$article->description.'</p><p><a href="'.Url::toRoute(['site/single', 'id'=>$article->id]).'" class="btn btn-primary">Подробнее <span class="glyphicon glyphicon-chevron-right"></a></p>',
        'options' => ['class'=>'']
    ];
}

echo Carousel::widget([
    'items' => $carousel,
    'options' => ['class' => 'slide', 'data-interval' => '10000'],
    'controls' => [
        '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>',
        '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>'
 ]
]);
?>
