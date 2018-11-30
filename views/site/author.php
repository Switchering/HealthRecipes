<?php
use app\widgets\Pager;
use yii\helpers\Url;

$this->title = 'HealthRecipes';
?>
<div class="section">
    <!-- PAGE HEADER -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-1 col-md-10 text-center">
                    <div class="author">
                        <img class="author-img center-block" src="<?= $author->getImage()?>" alt="">
                        <h1 class="text-uppercase"><?= $author->name?></h1>
                        <p class="lead"><?= $author->about?></p>
                        <ul class="author-social">
                            <li><a href="#"><i class="fa fa-vk"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
		<!-- /PAGE HEADER -->
    <!--Start Posts Container -->
    <div class="container" style="margin-top:20px">
        <!-- row -->
        <div class="row">
            <div class="col-md-8">
                <!-- post -->
                <?php foreach($articles as $article):?>
                <div class="post post-row">
                    <a class="post-img"><img src="<?= $article->getImage()?>" alt=""></a>
                    <div class="post-body">
                        <div class="post-category">
                            <a href="<?= Url::toRoute(['site/category', 'id'=>$article->category->id]);?>"><?= $article->category->title;?></a>
                        </div>
                        <h3 class="post-title"><a href="<?= Url::toRoute(['site/single','id'=>$article->id])?>"><?= $article->title?></a></h3>
                        <ul class="post-meta">
                            <li><a href="author.html"><?= $article->author->name?></a></li>
                            <li><?= $article->getDate()?></li>
                        </ul>
                        <p><?= $article->description?></p>
                    </div>
                </div>
                <?php endforeach;?>                
                <!-- /post -->
            
            <div class="section-row loadmore text-center">
                <!-- Start Pagination -->
 
                <!-- End Pagination -->
            </div>
        </div>
        <div class="col-md-4">
        <!-- Start Sidebar -->
        <?= $this->render('/partials/sidebar', [
                'popular'=>$popular,
                'recent'=>$recent,
                'categories'=>$categories
            ]);?>        
        <!-- End Sidebar --> 
        </div>
    </div>
   <!-- End Posts Container -->
    </div>
</div>