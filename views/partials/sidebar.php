<?php
use yii\widgets\LinkPager;
use yii\helpers\Url;
?>

<script type="text/javascript" src="https://vk.com/js/api/openapi.js?159"></script>
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
        <h2 class="title">Популярное</h2>
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

<!-- VK widget -->
<div class="aside-widget">
    <div class="section-title">
        <h2 class="title">ВКОНТАКТЕ</h2>
    </div>
    <div id="vk_groups" class="post post-widget"></div>
        <script type="text/javascript">
            VK.Widgets.Group("vk_groups", {mode: 3 , width: "auto" , height: "400",no_cover: 1 }, 35363834);
        </script>
</div>
<!-- /VK widget -->
<!-- End Sidebar -->
