  <?php
use yii\helpers\Url;
use app\models\Tag;
?>
<!-- section -->
<!-- PAGE HEADER -->
<div id="post-header" class="page-header">
    <div class="page-header-bg" style="background-image: url('<?= $article->getImage()?>');" data-stellar-background-ratio="0.5"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="post-category">
                    <a href="<?= Url::toRoute(['site/category', 'id'=>$article->category->id]);?>"><?= $article->category->title;?></a>
                </div>
                <h1><?= $article->title?></h1>
                <ul class="post-meta">
                    <li><a href="author.html"><?= $article->author->name?></a></li>
                    <li><?= $article->getDate()?></li>
                    <li><i class="fa fa-comments"></i> <?=$commentcount?></li>
                    <li><i class="fa fa-eye"></i> <?= $article->viewed?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /PAGE HEADER -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-8">
                    <!-- post share -->
                    <div class="section-row">
                            <div class="post-share">
<!--                                <a href="#" class="social-facebook"><i class="fa fa-facebook"></i><span>Share</span></a>
                                <a href="#" class="social-twitter"><i class="fa fa-twitter"></i><span>Tweet</span></a>
                                <a href="#" class="social-pinterest"><i class="fa fa-pinterest"></i><span>Pin</span></a>
                                <a href="#" ><i class="fa fa-envelope"></i><span>Email</span></a>-->
                            </div>
                    </div>
                    <!-- /post share -->

                    <!-- post content -->
                    <div class="section-row">
                        <p><?= $article->content?></p>
                    </div>
                    <!-- /post content -->

                    <!-- post tags -->
                    <div class="section-row">
                        <div class="post-tags">
                            <ul>
                                <li>ТЭГИ:</li>
                                <?php foreach ($tags as $tag):?>
                                <li><a href="<?= Url::toRoute(['site/tag','id'=>$tag->id])?>"><?= $tag->title?></a></li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                    <!-- /post tags -->

                    <!-- post nav -->
                    <div class="section-row">
                        <div class="post-nav">
                            <div class="prev-post">
                                <a class="post-img" href="<?= Url::toRoute(['site/single','id'=>$previous->id])?>"><img src="<?= $previous->getImage()?>" alt=""></a>
                                <h3 class="post-title"><a href="<?= Url::toRoute(['site/single','id'=>$previous->id])?>"><?= $previous->title?></a></h3>
                                <span>Предыдущий пост</span>
                            </div>

                            <div class="next-post">
                                <a class="post-img" href="<?= Url::toRoute(['site/single','id'=>$next->id])?>"><img src="<?= $next->getImage()?>" alt=""></a>
                                <h3 class="post-title"><a href="<?= Url::toRoute(['site/single','id'=>$next->id])?>"><?= $next->title?></a></h3>
                                <span>Следующий пост</span>
                            </div>
                        </div>
                    </div>
                    <!-- /post nav  -->

                    <!-- post author -->
                    <div class="section-row">
                        <div class="section-title">
                                <h3 class="title">О <a href="#"><?=$article->author->name?></a></h3>
                        </div>
                        <div class="author media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="author-img media-object" src="<?=$article->author->photo?>" alt="">
                                </a>
                            </div>
                            <div class="media-body">
                                <p style="color: red">Добавить описание в модель</p>
                                <ul class="author-social">
                                    <li><a href="#"><i class="fa fa-vk"></i></a></li>
                                    <li><a href="#"><i class="fa fa-telegram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /post author -->

                    <!-- /related post -->
                    <div>
                        <div class="section-title">
                            <h3 class="title">Публикации автора</h3>
                        </div>
                        <div class="row">
                            <!-- post -->
                            <?php foreach($related as $article):?>
                            <div class="col-md-4">
                                <div class="post post-sm">
                                    <a class="post-img" href="<?= Url::toRoute(['site/single','id'=>$article->id])?>"><img src="<?=$article->getImage()?>" alt=""></a>
                                    <div class="post-body">
                                        <div class="post-category">
                                            <a href="category.html"><?=$article->category->title?></a>
                                        </div>
                                        <h3 class="post-title title-sm"><a href="<?= Url::toRoute(['site/single','id'=>$article->id])?>l"><?= $article->title?></a></h3>
                                        <ul class="post-meta">
                                            <li><a href="#"><?=$article->author->name?></a></li>
                                            <li><?= $article->getDate()?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                            <!-- /post -->
                        </div>
                    </div>
                    <!-- /related post -->

                    <?= $this->render('/partials/comment',[
                        'article'=>$article,
                        'comments'=>$comments,
                        'commentForm'=>$commentForm,
                        'commentcount'=>$commentcount
                    ])?>  
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
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->