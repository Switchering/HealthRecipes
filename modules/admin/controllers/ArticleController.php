<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Category;
use app\models\ImageUpload;
use app\models\Tag;
use app\models\Article;
use app\models\ArticleSearch;
use app\models\Comment;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Article model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Article();

        if ($model->load(Yii::$app->request->post()) && $model->saveArticle()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        else
        {
            return $this->render('create', [
            'model' => $model,
        ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $uploader = new ImageUpload(['folder'=>'articles']);
        $image = $model->image;
        if ($model->load(Yii::$app->request->post()) && $model->saveArticle())
        {
          $tags = Yii::$app->request->post('tags');
          $model->saveTags($tags);
          $file = UploadedFile::getInstance($model,'image');
          if($file != null){
            if($model->saveImage($uploader->uploadFile($file, $image)))
            {
              return $this->redirect(['view', 'id' => $model->id]);
            }
          }
          else
          {
            if($model->saveImage($image))
            {
              return $this->redirect(['view', 'id' => $model->id]);
            }
          }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelimage($id)
    {
      $model = $this->findModel($id);
      $model->deleteImage();
      return $this->redirect(['update','id'=>$id]);
    }

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionComments($id)
    {
      $comments = Comment::find()->where(['article_id'=>$id])->orderBy('id desc')->all();

      return $this ->render('/comment/single',['comments'=>$comments]);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionExport()
    {
        $data = "Номер;Название;Описание;Контент;Дата;Изображение;Количество просмотров;Автор;Статус;Категории;\r\n";
        $model = Article::find()->All();
        foreach ($model as $value) {
          $content = str_replace("\r\n", '', $value->content);
          $description = str_replace("\r\n", '', $value->description);
            $data .= $value->id.
                    ';' . $value->title .
                    ';' . $description .
                    ';' . $content .
                    ';' . $value->date .
                    ';' . $value->image .
                    ';' . $value->viewed .
                    ';' . $value->user_id .
                    ';' . $value->status .
                    ';' . $value->category_id .
                    "\r\n";

        }
        echo iconv('utf-8', 'windows-1251',$data); //Если вдруг в Windows будут кракозябры
    }
}
