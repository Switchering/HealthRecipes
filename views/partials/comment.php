<!-- post comments -->
<div class="section-row">
    <div class="section-title">
        <h3 class="title">Комментариев: <?= $commentcount; ?></h3>
    </div>
    <div class="post-comments">
        <?php if(!empty($comments)):?> 
        <?php foreach($comments as $comment):?> 
        <!-- comment -->
        <div class="media">
            <div class="media-left">
                <img class="media-object" src="<?= $comment->user->image; ?>" alt="">
            </div>
            <div class="media-body">
                <div class="media-heading">
                    <h4><?= $comment->user->name;?></h4>
                    <span class="time"><?= $comment->getDate();?></span>
                </div>
                <p><?= $comment->text; ?></p>
                <a href="#" class="reply">Reply</a>
            </div>
        </div>
        <!-- /comment -->
        <?php endforeach;?> 
        <?php endif;?> 
    </div>
</div>
<!-- /post comments -->

<!-- post reply -->
<?php if(!Yii::$app->user->isGuest):?> 
<div class="section-row">
    <div class="section-title">
        <h3 class="title">Оставьте комментарий</h3>
        <?php if(Yii::$app->session->getFlash('comment')):?> 
        <div class="alert alert-success" role="alert"> 
        <?= Yii::$app->session->getFlash('comment'); ?> 
        </div> 
        <?php endif;?> 
    </div>
    <?php $form = \yii\widgets\ActiveForm::begin([ 
        'action'=>['site/comment', 'id'=>$article->id], 
        'options'=>['class'=>'post-reply', 'role'=>'form']])?>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <?= $form->field($commentForm, 'comment')->textarea(['class'=>'input','placeholder'=>'Написать сообщение...'])->label(false)?>
                </div>
            </div>
            <div class="col-md-12">
                <button class="primary-button">Отправить</button>
            </div>
        </div>
    <?php \yii\widgets\ActiveForm::end();?> 
</div>
<?php endif;?>
<!-- /post reply -->

