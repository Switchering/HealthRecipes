<?php
use yii\widgets\LinkPager;
use yii\helpers\Url;
?>
<div class="container zerogrid">
    <!--Start Posts Container -->
    <div class="col-2-3" id="post-container">
        <div class="wrap-col">
            <?php foreach($articles as $article):?>
            <!-- Start Artcicle Item -->
            <div class="post">
                <div class="post-margin">
                    <div class="post-avatar">
                        <div class="avatar-frame"></div>
                            <img alt='' src='http://1.gravatar.com/avatar/16afd22c8bf5c2398b206a76c9316a3c?s=70&amp;d=http%3A%2F%2F1.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D70&amp;r=G' class='avatar avatar-70 photo' height='70' width='70' /></div>
                            <h4 class="post-title"><a href="<?= Url::toRoute(['site/single', 'id'=>$article->id]);?>"><?= $article->title?></a></h4>
                            <ul class="post-status">
                                <li><i class="fa fa-clock-o"></i><?= $article->getDate()?></li>
                                <li>
                                    <i class="fa fa-folder-open-o"></i>
                                    <a href="<?= Url::toRoute(['site/categories', 'id'=>$article->category->id]);?>" title="Увидеть болше публикаций в категории <?= $article->category->title;?>" rel="category"><?= $article->category->title;?></a>
                                </li>
                                <li><i class="fa fa-comment-o"></i>No Comments</li>
                            </ul>
                            <div class="clear"></div>
                </div>
                <div class="featured-image">
                    <img src="<?= $article->getImage()?>" class="attachment-post-standard "/> 
                </div>
                <div class="post-margin">
                    <p><?= $article->description?></p>
                    
                    <div class="text-center text-uppercase">
                        <a href="<?= Url::toRoute(['site/single', 'id'=>$article->id]);?>" class="fa">Продолжить чтение</a>
                    </div>
                </div>

                <ul class="post-social">
                    <li><a href="#" class="readmore">Узнать больше<i class="fa fa-arrow-circle-o-right"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li><li><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                </ul>
                <div class="clear"></div>
            </div>
            <!-- End Post Item -->
            <?php endforeach;?>

            <!-- Start Pagination -->
            <?php        
               echo LinkPager::widget(['pagination' => $pagination,]);
            ?>
            <!-- End Pagination -->

            <div class="clear"></div>
        </div>
    </div>
   <!-- End Posts Container -->
   <!-- Start Sidebar -->
   <?= $this->render('/partials/sidebar', [
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories
   ]);?>
    <!-- End Sidebar -->
</div>