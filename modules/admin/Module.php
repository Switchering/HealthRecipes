<?php

namespace app\modules\admin;

use yii\filters\AccessControl;
use yii;
use app\models\Comment;
    Yii::$app->params['comments'] = Comment::getUnset();
/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $layout = '/admin/main';
    public $controllerNamespace = 'app\modules\admin\controllers';


    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public function behaviors()
    {
        return [
            'access' =>[
                'class' => AccessControl::className(),
                'denyCallback' => function($rule, $action)
                {
                    throw new \yii\web\NotFoundHttpException();
                },
                'rules' => [
                    [
                        'allow' => true,
                        'matchCallback' => function($rule, $action)
                        {
                            return Yii::$app->user->identity->isAdmin;
                        }
                    ]
                ]
            ]
        ];
    }
}
