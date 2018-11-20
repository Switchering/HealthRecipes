<?php
use yii\widgets\LinkPager;
use yii\helpers\Url;
use app\widgets\Pager;
?>

<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- /post -->
                <div class="col-md-8">
                    <div class="row">
                            <?php foreach ($articles as $article):?>
                            <!-- post -->
                            <div class="col-md-6">
                                    <div class="post">
                                            <a class="post-img" href="<?= Url::toRoute(['site/single', 'id'=>$article->id]);?>"><img src="<?= $article->getImage()?>" alt=""></a>
                                            <div class="post-body">
                                                    <div class="post-category">
                                                        <a href="<?= Url::toRoute(['site/category', 'id'=>$article->category->id]);?>"><?= $article->category->title?></a>
                                                    </div>
                                                    <h3 class="post-title"><a href="<?= Url::toRoute(['site/single', 'id'=>$article->id]);?>"><?= $article->title?></a></h3>
                                                    <ul class="post-meta">
                                                            <li><a href="author.html"><?= $article->author->name?></a></li>
                                                            <li><?= $article->getDate()?></li>
                                                    </ul>
                                            </div>
                                    </div>
                            </div>
                            <?php endforeach;?>
                            <!-- /post -->
                            <div class="clearfix visible-md visible-lg"></div>

                    </div>
                </div>
                <!-- post -->
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
