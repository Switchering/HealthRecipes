<?php
use app\widgets\Pager;
use yii\helpers\Url;

$this->title = 'HealthRecipes';
?>


<!--Start Main Container-->
<div class="section">
    <!-- Start Carousel -->
    <div style="margin-bottom:20px">
        <?= $this->render('/partials/carousel', [
                'recent'=>$recent
            ]);?>
    </div>
        <!-- End Carousel -->
    <!--Start Posts Container -->
   <div class="container">
      <!--   Recent row -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Популярные публикации</h2>
                </div>
            </div>
            <!-- post -->
            <?php foreach ($popular as $article):?>
            <div class="col-md-4">
                <div class="post">
                    <a class="post-img" href="<?=Url::toRoute(['site/single', 'id'=>$article->id]);?>"><img src="<?= $article->getImage()?>" alt=""></a>
                    <div class="post-body">
                        <div class="post-category">
                            <a href="<?=Url::toRoute(['site/category', 'id'=>$article->category->id]);?>"><?= $article->category->title?></a>
                        </div>
                        <h3 class="post-title"><a href="<?=Url::toRoute(['site/single', 'id'=>$article->id]);?>"><?= $article->title?></a></h3>
                        <ul class="post-meta">
                            <li><a href="<?=Url::toRoute(['site/author', 'id'=>$article->author->id]);?>"><?= $article->author->name?></a></li>
                            <li><?= $article->date?></li>
                        </ul>
                    </div>
                </div>
                <!-- /post -->
            </div>
            <?php endforeach;?>
        </div>
       <!-- end Recent row -->
       <!-- Categories-->
       <div class="row">
           <?php foreach ($categories as $category):?>
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title"><?=$category->title?></h2>
                </div>
            </div>
            <!-- post -->
            <?php foreach ($category->articles as $article):?>
            <div class="col-md-4">
                <div class="post">
                    <a class="post-img" href="<?=Url::toRoute(['site/single', 'id'=>$article->id]);?>"><img src="<?= $article->getImage()?>" alt=""></a>
                    <div class="post-body">
                        <div class="post-category">
                            <a href="<?=Url::toRoute(['site/category', 'id'=>$article->category->id]);?>"><?= $article->category->title?></a>
                        </div>
                        <h3 class="post-title"><a href="<?=Url::toRoute(['site/single', 'id'=>$article->id]);?>"><?= $article->title?></a></h3>
                        <ul class="post-meta">
                            <li><a href="author.html"><?= $article->author->name?></a></li>
                            <li><?= $article->date?></li>
                        </ul>
                    </div>
                </div>
<!--                     /post -->
            </div>
            <?php endforeach;?>
           <?php endforeach;?>
        </div>
<!--       End categories-->

<!--         End Posts Container -->
    </div>
</div>
