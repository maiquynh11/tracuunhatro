<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;

class AdminController extends Controller
{
    public $layout = "admin";

    public function actionIndex()
    {
        return $this->render("index");
    }
}