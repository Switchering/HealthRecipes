<?php

namespace app\modules\admin\controllers;

use yii;
use yii\web\Controller;
use app\models\User;
use app\models\Article;
use app\models\Category;
/**
 * Default controller for the `admin` module
 */
class MailController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
      $articles = Article::find()->limit(2)->all();
      $categories = Category::find()->limit(2)->all();

      return $this->render('index',[
        'articles'=>$articles,
        'categories'=>$categories
      ]);
    }

    public function actionTestMailer()
    {
        $articles = Article::find()->limit(2)->all();
        $categories = Category::find()->limit(2)->all();
        \app\models\User::findByName('Егор')->sendMail('example', 'Пример письма',$articles, $categories);
    }
}
