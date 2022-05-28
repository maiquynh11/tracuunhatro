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
use app\models\Binhluan;
use yii\widgets\ActiveForm;
use yii\web\NotFoundHttpException;

class PostsController extends Controller 
{
    
    public function actionIndex() {
        return $this->render('index');
    }
    public function actionView($id) {  
        $model = Nhatro::findOne(['id' => $id]);

        ////////////////////
        if (Yii::$app->request->isPost && !Yii::$app->user->isGuest) {
            $binhluan = new Binhluan();
            $binhluan->load(Yii::$app->request->post());
            $binhluan->user_id = Yii::$app->user->id;
            $binhluan->save();
        }

        $listBinhluan = Binhluan::find()->where(['nhatro_id' => $model->id])->all();

        return $this->render('view', ['model' => $model, 'listBinhluan' => $listBinhluan]);
    }
    public function actionDelete($id) {
        $binhluan = $this->findModel($id);
        if ($binhluan->belongsTo(Yii::$app->user->id) || $binhluan->nhatro->belongsTo(Yii::$app->user->id)){
            $binhluan->delete;
            return ['success' => true];
        }
    }
    protected function findModel($id)
    {
        if (($model = Binhluan::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}