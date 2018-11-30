<?php 
$itemSmall = null;
foreach ($model->getBehavior('galleryBehavior')->getImages() as $image) {
    //        echo Html::img($image->getUrl('medium'));
    //        $item[] = '<img src="' . Url::to($image->getUrl('medium') . '"/>', true);
    $itemSmall[] = Html::img($image->getUrl('small'));
    Yii::info($image->getUrl('medium'));
}
$itemMedium = null;
foreach ($model->getBehavior('galleryBehavior')->getImages() as $image) {
    $itemMedium[] = Html::img($image->getUrl('medium'));
}
if ($itemSmall != null && $itemMedium != null) {
    echo Slick::widget(['itemContainer' => 'div', 'containerOptions' => ['class' => 'slider-for'], 'items' => $itemMedium, 'itemOptions' => ['class' => 'cat-image'], 'clientOptions' => ['slidesToShow' => 1, 'slidesToScroll' => 1, 'centerMode' => true, 'arrows' => false, 'fade' => true, 'adaptiveHeight' => true, 'asNavFor' => '.slider-nav', 'centerPadding' => '500px']]);
    echo Slick::widget(['itemContainer' => 'div', 'containerOptions' => ['class' => 'slider-nav'], 'items' => $itemSmall, 'itemOptions' => ['class' => 'cat-image'], 'clientOptions' => ['slidesToShow' => 7, 'slidesToScroll' => 1, 'asNavFor' => '.slider-for', 'dots' => true, 'centerMode' => true, 'focusOnSelect' => true, 'arrows' => true]]);
}

<?=Slick::widget([

    // HTML tag for container. Div is default.
    'itemContainer' => 'div',

    // HTML attributes for widget container
    'containerOptions' => ['class' => 'row'],

    // Items for carousel. Empty array not allowed, exception will be throw, if empty 
    'items' => [
        Html::img('/uploads/119a4c68af57d7397de35299c19ca920.jpg'),
        Html::img('/uploads/733c6cd331a5706229dc94f0867bc10a.jpg'),
        Html::img('/cat_gallery/cat_003.png'),
        Html::img('/cat_gallery/cat_004.png'),
        Html::img('/cat_gallery/cat_005.png'),
    ],

    // HTML attribute for every carousel item
    'itemOptions' => ['class' => 'cat-image'],
    'clientOptions' => [
        'dots'     => true,
        'arrows' => true,
        // note, that for params passing function you should use JsExpression object
        'onAfterChange' => new JsExpression('function() {console.log("The cat has shown")}'),
    ],

]); ?>

