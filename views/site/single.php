  <?php
use yii\helpers\Url;
?>


    <!-- Start Main Container -->
<div class="container zerogrid">
    <!-- Start Posts Container -->
    <div class="col-2-3" id="post-container">
        <div class="wrap-col">
            <!-- Start Post Item -->
            <div class="post">
                <div class="post-margin">
                    <div class="post-avatar">
                        <div class="avatar-frame"></div>
                        <img alt='' src='http://1.gravatar.com/avatar/16afd22c8bf5c2398b206a76c9316a3c?s=70&amp;d=http%3A%2F%2F1.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D70&amp;r=G' class='avatar avatar-70 photo' height='70' width='70' />                
                    </div>

                    <h4><?= $article->title?></h4>
                    <ul class="post-status">
                        <li><i class="fa fa-clock-o"></i><?= $article->getDate()?></li>
                        <li>
                            <i class="fa fa-folder-open-o"></i>
                            <a href="<?= Url::toRoute(['site/category', 'id'=>$article->category->id]);?>" title="Увидеть болше публикаций в категории <?= $article->category->title;?>" rel="category"><?= $article->category->title;?></a> 
                        </li>
                        <li><i class="fa fa-comment-o"></i>No Comments</li>
                    </ul>
                    <div class="clear"></div>
                </div>

                <div class="featured-image">
                    <img src="<?= $article->getImage()?>" class="attachment-post-standard "  />                    
                    <div class="post-icon">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                </div>

                <div class="post-margin">
                    <p><?= $article->content?></p>
                <!-- Post Tags -->
                    <div class="post-tags">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-tags fa-stack-1x fa-inverse"></i>
                        </span>
                        <a href="#" rel="tag">Color Schemes</a>, 
                        <a href="#" rel="tag">Gallery</a>, 
                        <a href="#" rel="tag">Images</a>, 
                        <a href="#" rel="tag">Standard</a>
                    </div>
                <div class="clear"></div>            
                <!-- End Post Tags -->
                </div>

                <!-- Post Social -->
                <ul class="post-social">
                    <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                </ul>
                <!-- End Post Social -->
                <div class="clear"></div>
            </div>
        <!-- End Post Item -->
            <div class="post">
                <div class="post-margin">
                <!-- Start Related Item -->
                    <div class="related-posts">
                        <div class="post-avatar">
                            <div class="avatar-frame"></div>
                            <img width="70" height="70" src="public/img/one-more-beer-70x70.png" class="attachment-post-widget #"  />    
                        </div>
                        <div class="related-posts-aligned">            
                            <h6><a href="#">One More Beer</a></h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sit amet auctor ligula. Donec eu</p>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <!-- End Related Item -->
                    <div class="clear"></div>
                </div>
            </div>            

                                    <!-- Comments -->
            <div class="comment-container">
                <h6 id="comment-header">No Comments, Be The First!</h6>
                <ul class="comment-list">
                    
                </ul>
                <!-- Comment Form -->
                <div class="commen-form">
                    <div id="respond" class="comment-respond">
                        <h3 id="reply-title" class="comment-reply-title"> <small><a rel="nofollow" id="cancel-comment-reply-link" href="#" style="display:none;">Cancel Reply</a></small></h3>
                        <form action="" method="post" id="comment-form-container" class="comment-form">
                            <p class="comment-notes"></p>
                            <textarea name="comment" placeholder="Enter Message Here" class="comment-text-area"></textarea>						
                            <p class="form-allowed-tags"></p>
                            <p class="form-submit">
                                <input name="submit" type="submit" id="comment-submit" value="Send Comment" />
                                <input type='hidden' name='comment_post_ID' value='49' id='comment_post_ID' />
                                <input type='hidden' name='comment_parent' id='comment_parent' value='0' />
                            </p>
                        </form>
                    </div><!-- #respond -->
                    <div class="clear"></div>
            </form>
                </div>
            <!-- End Comment Form -->
            </div>
            <!-- End Comments -->
            <div class="clear"></div>
        </div>
    </div>
    <!-- End Posts Container -->

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
                        <a href="#" title="View all posts filed under Apps"><?= $category->title?></a>
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
                        <h6><a href="#"><?= $article->title?></a></h6>
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
                        <h6><a href="#"><?= $article->title?></a></h6>
                        <span><?= $article->getDate()?></span>
                        <div class="clear"></div>
                    </li>
                    <?php endforeach;?>
                </ul>
                <div class="clear"></div>      
                <!-- End Widget -->
                <div class="clear"></div> 
            </div>
            <div class="widget-container">
                <h6 class="widget-title">Tag Cloud</h6>
                <div class="tagcloud">
                    <a href='#' class='tag-link-12' title='1 topic' style='font-size: 8pt;'>Color Schemes</a>
                    <a href='#gallery' class='tag-link-6' title='1 topic' style='font-size: 8pt;'>Gallery</a>
                    <a href='#images' class='tag-link-8' title='1 topic' style='font-size: 8pt;'>Images</a>
                    <a href='#light' class='tag-link-11' title='1 topic' style='font-size: 8pt;'>Light</a>
                    <a href='#post' class='tag-link-7' title='1 topic' style='font-size: 8pt;'>Post</a>
                    <a href='#slider' class='tag-link-9' title='1 topic' style='font-size: 8pt;'>Slider</a>
                    <a href='#standard' class='tag-link-10' title='1 topic' style='font-size: 8pt;'>Standard</a>
                </div>
                <div class="clear"></div>
            </div> 
            <div class="clear"></div>
        </div>        
    </div>        <!-- End Sidebar -->
    <div class="clear"></div>
</div>
                        <!-- End Main Container -->

