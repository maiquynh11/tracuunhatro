<?php

namespace app\controllers;

use Yii;
use app\models\Nhatro;
use app\models\NhatroSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Comment;
use app\models\Dmdientich;
use app\models\Dmgia;
use app\models\Dmkhuvuc;
use app\models\Binhluan;
use app\models\NhatroDmdoituong;
// use app\models\DmtienichNhatro;
use app\models\Dmdoituong;
use app\models\Dmtienich;
use app\models\NhatroDmtienich;
use app\models\User;
use app\models\Tienich;
use app\models\VListnhatroTienich;
use app\models\VNhatro;
use app\models\VNhatroDmdoituong;
use app\models\VNhatroDmtienich;

use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\helpers\VarDumper;
use yii\helpers\ArrayHelper;
use yii\data\Sort;

class PostsController extends Controller 
{
    
    public function actionIndex() {
        $listNhatro = Nhatro::find()->all();
        $dataProvider = new ActiveDataProvider([
            'query' => Nhatro::find(),
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
        $sort = new Sort([
            'attributes' => [
                'default' => [
                    'default' => SORT_DESC,
                    'label' => 'Mặc định',
                ],
                'created_at' => [
                    'asc' => ['created_at' => SORT_ASC],
                    'label' => 'Mới nhất',
                ],
            ],
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'listNhatro' => $listNhatro,
            'sort' => $sort
        ]);
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
        // $this->saveCounters(array('views'=>1));
        $listBinhluan = Binhluan::find()->where(['nhatro_id' => $model->id])->all();

        return $this->render('view', ['model' => $model, 'listBinhluan' => $listBinhluan]);
    }
    public function actionShow($id) {
        $listNhatro = Nhatro::find()->where(['dmkhuvuc_id' => $id])->all();
        return $this->render('show', ['listNhatro' => $listNhatro]);

    }
    // public function actionDelete($id) {
    //     $binhluan = $this->findModel($id);
    //     if ($binhluan->belongsTo(Yii::$app->user->id) || $binhluan->nhatro->belongsTo(Yii::$app->user->id)){
    //         $binhluan->delete;
    //         return ['success' => true];
    //     }
    // }
    protected function findModel($id)
    {
        if (($model = Nhatro::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    }