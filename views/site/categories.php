<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<!--main content start-->
<div class="container zerogrid">
    <div class="list_carousel">
        <ul id="featured-posts">
            <?php foreach($categories as $category):?>
                <li class="first carousel-item">
                    <div class="post-margin">
                        <h6><a href="<?= Url::toRoute(['site/category', 'id'=>$category->id]);?>"><?= $category->title?></a></h6>
                    </div>
                    <div class="featured-image">
                        <img width="200" height="130" src="<?= $category->getImage()?>"/>                
                        <div class="post-icon">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-picture-o fa-stack-1x fa-inverse"></i>                    
                            </span>
                        </div>
                    </div>    
<!--                    <div class="post-margin">
                        <p>JjhgjhgkjhgkjhghjkghgkhjgkjhgJjhgjhgkjhgkjhghjkghgkhjgkjhgJjhgjhgkjhgkjhghjkghgkhjgkjhgJjhgjhgkjhgkjhghjkghgkhjgkjhg</p>
                    </div>-->
                </li>
            <?php endforeach;?>
        </ul>
    </div>
                <?php
//                echo LinkPager::widget([
//                    'pagination' => $pagination,
//                ]);
                ?>
</div>
            <?
//                $this->render('/partials/sidebar', [
//                'popular'=>$popular,
//                'recent'=>$recent,
//                'categories'=>$categories
//            ]);
            ?>
<!-- end main content-->