<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\models\Comment;
/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
