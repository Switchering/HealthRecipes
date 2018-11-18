<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <?php foreach($categories as $category):?>
                <div class="col-md-4">
                    <div class="section-title">
                        <h2 class="title"><a href="<?= Url::toRoute(['site/category', 'id'=>$category->id]);?>"</a><?= $category->title?></h2>
                    </div>
                    <!-- post -->
                    <div class="post">
                        <a class="post-img" href="<?= Url::toRoute(['site/category', 'id'=>$category->id]);?>"><img src="<?= $category->getImage()?>" alt=""></a>
   
                    </div>
                    <!-- /post -->
                </div>
            <?php endforeach;?>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->