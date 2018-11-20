 <div id="navigation">
                  <ul class="menu">
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children"><a href="/">Главная</a>
                    </li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children">
                      <a href="" >Категории<b class="caret"></b></a>
                    </li>
                    <li><a href="about.html">О нас</a></li>
                      <?php if(Yii::$app->user->isGuest):?>
                    <li class="nav navbar-nav navbar-right"><a href="<?= Url::toRoute(['auth/login'])?>">Вход</a></li>
                    <li class="nav navbar-nav navbar-right"><a href="<?= Url::toRoute(['auth/signup'])?>">Регистрация</a></li>
                      <?php else: ?>
                    <li class="nav navbar-nav navbar-right"><a href="<?= Url::toRoute(['auth/logout'])?>">Выход (<?=Yii::$app->user->identity->name ?>)</a></li>
                      <?php endif;?>
                  </ul>
                </div>
            </div>
        </div>
        
        <?php foreach($articles as $article):?>
        <!-- Start Artcicle Item -->
        <div class="panel panel-default">
            <div class="post-header">
                <div class="avatar-frame"></div>
                    <div class="post-avatar col-md-2">
                    <?php if($article->author->photo!=null):?>
                        <img alt='' src="<?= $article->author->photo?>" class='avatar avatar-70 photo' height='70' width='70' />
                    <?php else:?>
                        <img alt='' src='http://1.gravatar.com/avatar/16afd22c8bf5c2398b206a76c9316a3c?s=70&amp;d=http%3A%2F%2F1.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D70&amp;r=G' class='avatar avatar-70 photo' height='70' width='70' />
                    <?php endif;?>
                    </div>
                    <div class ="title col-md-10">
                        <h4 class="post-title"><a href="<?= Url::toRoute(['site/single', 'id'=>$article->id]);?>"><?= $article->title?></a></h4>
                        <ul class="inline">
                            <li><i class="glyphicon glyphicon-time"></i><?= $article->getDate()?></li>
                            <li>
                                <i class="glyphicon glyphicon-folder-open"></i>
                                <a href="<?= Url::toRoute(['site/category', 'id'=>$article->category->id]);?>" title="Увидеть болше публикаций в категории <?= $article->category->title;?>" rel="category"><?= $article->category->title;?></a>
                            </li>
                            <li><i class="glyphicon glyphicon-comment"></i>No Comments</li>
                        </ul>
                    </div>
            </div>
            <div class="featured-image">
                <img src="<?= $article->getImage()?>" class="img-fluid"/> 
            </div>
            <div class="post-margin">
                <p><?= $article->description?></p>

                <div class="text-center text-uppercase">
                    <a href="<?= Url::toRoute(['site/single', 'id'=>$article->id]);?>" class="fa">Продолжить чтение</a>
                </div>
            </div>

            <ul class="post-social">
                <li><a href="#" class="readmore">Узнать больше<i class=""></i></a></li>
                <li><a href="#" target="_blank"><i class=""></i>VK</a></li>
                <li><a href="#" target="_blank"><i class=""></i>Instagram</a></li>
            </ul>
        </div>
        <!-- End Post Item -->
        <?php endforeach;?>

        
        <div class="col-md-3">
        <div class="wrap-col">
            <div class="widget-container">
                <form role="search" method="get" id="searchform" class="searchform" action="">
                    <div>
                        <label class="screen-reader-text" for="s">Search for:</label>
                        <input type="text" value="" name="s" id="s" />
                        <button class="btn btn-outline">
                            Поиск
                            <i class="glyphicon glyphicon-search" aria-hidden="true"></i>
                        </button>
                    </div>
                </form>
                <div class="clear"></div>      
            </div>
            <div class="widget-container"><h6 class="widget-title">Категории</h6>		
                <ul>
                    <?php foreach ($categories as $category):?>
                    <li class="cat-item cat-item-5">
                        <a href="<?= Url::toRoute(['site/category', 'id'=>$category->id]);?>" title="Увидеть больше публикаций в категории"><?= $category->title?></a>
                        <span class="badge"><?= $category->getArticlesCount();?></span>
                    </li>
                    <?php endforeach;?>
                </ul>
            </div>
            
            <div class="widget-container"><h6 class="widget-title">Последние публикации</h6>
                <ul class="widget-recent-posts">  
                    <?php foreach ($recent as $article):?>
                    <li>
                        <div class="post-image">
                            <div class="post-mask"></div>
                            <img width="70" height="70" src="<?= $article->getImage()?>" class=" img-circle"  />                
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
                            <img width="70" height="70" src="<?= $article->getImage()?>" class="img-circle"  />                
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
                <p class="pull-left"><a><?= $article->author->name?></a></p>
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
                          
        <!-- Comments -->
        <?= $this->render('/partials/comment',[
            'article'=>$article,
            'comments'=>$comments,
            'commentForm'=>$commentForm
        ])?>
        <!-- End Comments -->
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
    <div class="clear"></div>
</div>
                        <!-- End Main Container -->

<?php foreach($tags as $tag);?>
                                <li><a href="#"><?= $tag->title?></a></li>
                              
  <?phpendforeach;?>

                                
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
