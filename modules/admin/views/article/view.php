<?php
use yii\helpers\Url;
use yii\helpers\html;

$this->title = $model->title;
$previous = $model->previous;
$next = $model->next;
$related = $model->related;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-view">
  <p>
      <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
      <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
          'class' => 'btn btn-danger',
          'data' => [
              'confirm' => 'Are you sure you want to delete this item?',
              'method' => 'post',
          ],
      ]) ?>
  </p>

<!-- PAGE HEADER -->
<div id="post-header" class="page-header">
  <div class="page-header-bg" style="background-image: url('<?= $model->getImage()?>');background-size:cover;"></div>
  <div class="container">
      <div class="row">
          <div class="col-md-10">
              <div class="post-category">
                  <a href="<?= Url::toRoute(['site/category', 'id'=>$model->category->id]);?>"><?= $model->category->title;?></a>
              </div>
              <h1><?= $model->title?></h1>
              <ul class="post-meta">
                  <li><a href="author.html"><?= $model->author->name?></a></li>
                  <li><?= $model->getDate()?></li>
                  <li><i class="fa fa-comments"></i> <?=$commentcount?></li>
                  <li><i class="fa fa-eye"></i> <?= $model->viewed?></li>
              </ul>
          </div>
      </div>
  </div>
</div>

      <!-- row -->
      <div class="row">
          <div class="col-md-12">
                  <!-- post share -->
                  <div class="section-row">
                          <div class="post-share">
                          </div>
                  </div>
                  <!-- /post share -->

                  <!-- post content -->
                  <div class="section-row">
                      <p><?= $model->content?></p>
                  </div>
                  <!-- /post content -->

                  <!-- post tags -->
                  <div class="section-row">
                      <div class="post-tags">
                          <ul>
                              <li>ТЭГИ:</li>
                              <?php foreach ($model->tags as $tag):?>
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
                              <h3 class="title"><a href="#"><?=$model->author->name?></a></h3>
                      </div>
                      <div class="author media">
                          <div class="media-left">
                              <a href="#">
                                  <img class="author-img media-object" src="<?=$model->author->photo?>" alt="">
                              </a>
                          </div>
                          <div class="media-body">
                              <p><?=$model->author->about?></p>
                              <ul class="author-social">
                                  <li><a href="#"><i class="fa fa-vk"></i></a></li>
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


          </div>
      </div>
      <!-- /row -->

</div>
<!-- /SECTION -->
