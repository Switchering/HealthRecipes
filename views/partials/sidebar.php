<?php
use yii\widgets\LinkPager;
use yii\helpers\Url;
?>
<!-- Start Sidebar -->
    <div class="col-1-3">
        <div class="wrap-col">
            <div class="widget-container">
                <form role="search" method="get" id="searchform" class="searchform" action="">
                    <div>
                        <label class="screen-reader-text" for="s">Search for:</label>
                        <input type="text" value="" name="s" id="s" />
                        <input type="submit" id="searchsubmit" value="Search" />
                    </div>
                </form>
                <div class="clear"></div>      
            </div>
            <div class="widget-container"><h6 class="widget-title">Категории</h6>		
                <ul>
                    <?php foreach ($categories as $category):?>
                    <li class="cat-item cat-item-5">
                        <a href="<?= Url::toRoute(['site/category', 'id'=>$category->id]);?>" title="Увидеть болше публикаций в категории"><?= $category->title?></a>
                        <span>(<?= $category->getArticlesCount();?>)</span>
                    </li>
                    <?php endforeach;?>
                </ul>
            <div class="clear"></div>
            </div>
            <div class="widget-container"><h6 class="widget-title">Последние публикации</h6>
                <ul class="widget-recent-posts">  
                    <?php foreach ($recent as $article):?>
                    <li>
                        <div class="post-image">
                            <div class="post-mask"></div>
                            <img width="70" height="70" src="<?= $article->getImage()?>" class="attachment-post-widget #"  />                
                        </div>
                        <h6><a href="<?= Url::toRoute(['site/single', 'id'=>$article->id]);?>"><?= $article->title?></a></h6>
                        <span><?= $article->getDate()?></span>
                        <div class="clear"></div>
                    </li>
                    <?php endforeach;?>
                </ul>
            <div class="clear"></div>
            </div>    
            <div class="clear"></div>
            <div class="widget-container"><h6 class="widget-title">Самые популярные</h6>
                <ul class="widget-recent-posts">  
                    <?php foreach ($popular as $article):?>
                    <li>
                        <div class="post-image">
                            <div class="post-mask"></div>
                            <img width="70" height="70" src="<?= $article->getImage()?>" class="attachment-post-widget #"  />                
                        </div>
                        <h6><a href="<?= Url::toRoute(['site/single', 'id'=>$article->id]);?>"><?= $article->title?></a></h6>
                        <span><?= $article->getDate()?></span>
                        <div class="clear"></div>
                    </li>
                    <?php endforeach;?>
                </ul>
                <div class="clear"></div>
           </div> 
        </div>
    </div>        
   <!-- End Sidebar -->