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
use app\models\Tag;
use app\models\CommentForm;
use app\models\User;

Yii::$app->view->params['categories'] = Category::getAll(3);
Yii::$app->view->params['tags'] = Tag::getAll(8);

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

//    public function actionContact()
//    {
//        $model = new ContactForm();
//        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
//            Yii::$app->session->setFlash('contactFormSubmitted');
//
//            return $this->refresh();
//        }
//        return $this->render('contact', [
//            'model' => $model,
//        ]);
//    }

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
        $data = Article::getAll();
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = Category::getAll(2);

        return $this->render('index',[
            'articles'=>$data['articles'],
            'pagination'=>$data['pagination'],
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories
        ]);
    }

    public function actionPosts()
    {
        $data = Article::getAll();
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = Category::getAll(0);

        return $this->render('posts',[
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
        $categories = Category::getAll(0);
        $tags = $article->tags;
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
        $categories = Category::getAll(0);
        return $this->render('categories',[
            'categories'=>$categories
        ]);
    }

    public function actionCategory($id)
    {
        $category = Category::findOne($id);
        $data = Category::getArticlesByCategory($id);
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = Category::getAll(0);

        return $this->render('category',[
            'category' => $category,
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

    public function actionTag($id)
    {
        $tag = Tag::findOne($id);
        $articles = $tag->articles;
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = Category::getAll(0);

        return $this->render('tag',[
            'tag'=>$tag,
            'articles'=>$articles,
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories
        ]);
    }

    public function actionAuthor($id)
    {
        $author = User::findOne($id);
        $articles = $author->articles;
        $popular = Article::getPopular();
        $recent = Article::getRecent();
        $categories = Category::getAll(0);

        return $this->render('author',[
            'author'=>$author,
            'articles'=>$articles,
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories
        ]);
    }

    public function actionMakesub($email)
    {
      $newsub = new User;
      $newsub->makeSubscriber($email);
      return $this->redirect(['/site/index']);
    }
}
