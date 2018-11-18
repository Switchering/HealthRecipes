<?php
use yii\widgets\LinkPager;
use yii\helpers\Url;
?>
<!-- Start Sidebar -->
<!-- category  -->
 <div class="aside-widget">
    <div class="section-title">
        <h2 class="title">Категории</h2>
    </div>
    <div class="category-widget">
        <ul>
            <?php foreach ($categories as $category):?>
                <li>
                    <a href="<?= Url::toRoute(['site/category','id'=>$category->id]);?>" title="Увидеть больше публикаций в категории"><?= $category->title?>
                        <span><?= $category->getArticlesCount();?></span>
                    </a>
                </li>
            <?php endforeach;?>
        </ul>
    </div>
</div>
<!-- /category -->
<!-- popular post -->
<div class="aside-widget">
    <div class="section-title">
        <h2 class="title">Популярные публикации</h2>
    </div>
    <!-- post -->
    <?php foreach ($popular as $article):?>
    <div class="post post-widget">
        <a class="post-img" href="<?= Url::toRoute(['site/single', 'id'=>$article->id]);?>"><img src="<?= $article->getImage()?>" alt=""></a>
        <div class="post-body">
            <div class="post-category">
                <a href="<?= Url::toRoute(['site/category', 'id'=>$article->category->id]);?>"><?= $article->category->title;?></a>
            </div>
            <h3 class="post-title"><a href="<?= Url::toRoute(['site/single', 'id'=>$article->id]);?>"><?= $article->title?></a></h3>
        </div>
    </div>
    <?php endforeach;?>
    <!-- /post -->
</div>
<!-- /post widget -->
<!-- End Sidebar -->