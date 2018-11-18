<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\data\Pagination;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Article;
use app\models\Category;
use app\models\CommentForm;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    
    public function actionIndex()
    {
        $data = Article::getAll(5);
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = Category::getAll();
        
        return $this->render('index',[
            'articles'=>$data['articles'],
            'pagination'=>$data['pagination'],
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories
        ]);
    }
    
    public function actionSingle($id) 
    {
        $article= Article::findOne($id);
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $related = Article::getRelated($id);
        $previous = Article::getPrevious($id);
        $next = Article::getNext($id);
        $categories = Category::getAll();
        $tags = $article->getSelectedTags();
        $comments = $article->getArticleComments();
        $commentForm = new CommentForm();
        $commentcount = $article->getCommentsCount();
        $article->viewedCounter();
        
        return $this->render('single',[
            'commentcount'=>$commentcount,
            'article'=>$article,
            'popular'=>$popular,
            'recent'=>$recent,
            'related'=>$related,
            'previous'=>$previous,
            'next'=>$next,
            'categories'=>$categories,
            'tags'=>$tags,
            'comments'=>$comments,
            'commentForm'=>$commentForm
        ]);
    }
    
    public function actionCategories() 
    {
        $categories = Category::getAll();
        return $this->render('categories',[
            'categories'=>$categories
        ]);
    }
    
    public function actionCategory($id)
    {
        $data = Category::getArticlesByCategory($id);
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = Category::getAll();
        
        return $this->render('category',[
            'articles'=>$data['articles'],
            'pagination'=>$data['pagination'],
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories
        ]);
    }
    
    public function actionComment($id)
    {
        $model = new CommentForm();
        
        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if($model->saveComment($id))
            {
                Yii::$app->getSession()->setFlash('comment','Ваш комментарий скоро будет добавлен');
                return $this->redirect(['site/single','id'=>$id]);
            }
        }
    }
}
