<?php
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;


/* @var $this \yii\web\View */
/* @var $content string */
if (Yii::$app->controller->action->id === 'login')
{
    echo $this->render(
        'wrapper-black',
        ['content' => $content]
    );
}
else
{
    dmstr\web\AdminLteAsset::register($this);
    \app\assets\AppAsset::register($this);
    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@bower') . '/admin-lte';
  ?>
<?php $this->beginPage() ?>
  <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
      <head>
          <meta charset="<?= Yii::$app->charset ?>"/>
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <?= Html::csrfMetaTags() ?>
          <title><?= Html::encode($this->title) ?></title>
          <?php $this->head() ?>
      </head>

    <body class="skin-black">
    <?php $this->beginBody() ?>
    <?= $this->render(
        'header.php',
        ['directoryAsset' => $directoryAsset,
          'comments' => $this->params['comments']
        ]
    ) ?>

    <div class="wrapper row-offcanvas row-offcanvas-left">

        <?= $this->render(
            'left.php',
            ['directoryAsset' => $directoryAsset]
        )
        ?>

        <?= $this->render(
            'content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>

    </div>

    <?php $this->endBody() ?>
    <?php $this->registerJsFile('/ckeditor/ckeditor.js');?>
    <?php $this->registerJsFile('/ckfinder/ckfinder.js');?>
    <script>
    $(document).ready(function(){
        var editor = CKEDITOR.replaceAll();
        CKFinder.setupCKEditor(editor);
    })
    </script>
    </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>
