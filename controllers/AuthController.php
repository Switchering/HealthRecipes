<?php
namespace app\controllers;

use app\models\LoginForm;
use Yii;
use yii\web\Controller;
use app\models\User;
use app\models\Category;
use app\models\SignupForm;
use app\models\Tag;
use app\models\Article;

Yii::$app->view->params['tags'] = Tag::getAll(8);
Yii::$app->view->params['categories'] = Category::getAll(3);

class AuthController extends Controller
{
     public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('/auth/login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionSignup()
    {
        $model = new SignupForm();

        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if($model->signup())
            {
                return $this->redirect(['auth/login']);
            }
        }
        return $this->render('signup',['model'=>$model]);
    }

    public function actionLoginVk($uid, $first_name, $photo)
    {
        $user = new User();
        if ($user->saveFromVk($uid, $first_name, $photo))
        {
            return $this->redirect(['site/index']);
        }
    }
}
