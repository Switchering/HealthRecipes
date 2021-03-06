<?php
use app\widgets\Pager;
use yii\helpers\Url;

$this->title = 'HealthRecipes';
?>


<!--Start Main Container-->    
<div class="section">
    <!--Start Posts Container -->
    <div class="container">
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
                <?php        
                    echo Pager::widget([
                        'pagination' => $pagination,
                        'maxButtonCount' => 2
                        ]);
                ?>
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