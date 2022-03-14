<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Nhatro;

class PostsController extends Controller 
{
    public function actionIndex() {
        return $this->render('index');
    }
    public function actionView($id) {  
       $nhatro = Nhatro::find()->all();
       $model = Nhatro::findOne(['id' => $id]);
       return $this->render('view', ['model' => $model]);
    }
    public function actionCreate() {
        
    }
}