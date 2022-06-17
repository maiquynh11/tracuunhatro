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
    public function actionCreate() {
        $model = new Nhatro();
        if($model->load(Yii::$app->request->post())) {
            if($model->save()) {
               // Save doituong
                $listDmDoituongId = Yii::$app->request->post('list_dmdoituong_id');
                foreach ($listDmDoituongId as $dmDoituongId) {
                    $nhatroDmDoituong = new NhatroDmdoituong();
                    $nhatroDmDoituong->nhatro_id = $model->id;
                    $nhatroDmDoituong->doituong_id = $dmDoituongId;
                    $nhatroDmDoituong->save();
                }
                $listDmTienichId = Yii::$app->request->post('list_dmtienich_id');
                foreach ($listDmTienichId as $dmTienichId) {
                    $nhatroDmTienich = new NhatroDmtienich();
                    $nhatroDmTienich->nhatro_id = $model->id;
                    $nhatroDmTienich->tienich_id = $dmTienichId;
                    $nhatroDmTienich->save();
                }
              
                Yii::$app->session->addFlash('success', 'Đã đăng !');
                return $this->redirect(['view', 'id' => $model->id]);
            }
            else {
                Yii::$app->session->addFlash('danger', 'Không hợp lệ !');
                return $this->render('create', ['model' => $model,]);
            }
        }
        $listDmKhuvuc = Dmkhuvuc::find()->all();
        $listDmDoituong = Dmdoituong::find()->all();
        $listDmTienich = Dmtienich::find()->all();
        return $this->render('create', [
            'model' => $model, 
            'listDmKhuvuc' => $listDmKhuvuc,
            'listDmDoituong' => $listDmDoituong,
            'listDmTienich' => $listDmTienich,
           
        ]);

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