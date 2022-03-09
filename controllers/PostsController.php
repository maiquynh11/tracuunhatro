<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class PostsController extends Controller 
{
    public function actionIndex() 
    {
        return $this->render('index');
    }

    public function actionView() 
    {
        return $this->render('view');
    }
    public function actionCreate() 
    {
        return $this->render('create');
    }
}