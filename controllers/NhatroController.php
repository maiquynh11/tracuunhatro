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
use app\models\NhatroDmdoituong;
use app\models\Dmdoituong;
use app\models\Dmtienich;
use app\models\NhatroDmtienich;
use app\models\Tienich;
use app\models\VNhatro;
use app\models\VNhatroDmdoituong;
use app\models\VNhatroDmtienich;
use yii\data\ActiveDataProvider;
use yii\helpers\VarDumper;

/**
 * NhatroController implements the CRUD actions for Nhatro model.
 */
class NhatroController extends Controller
{
    /**
     * @inheritDoc
     */
    public $layout = 'nhatro';
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }
    /**
     * Lists all Nhatro models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $listDmKhuvuc = Dmkhuvuc::find()->all();
        $searchModel = new NhatroSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider = new ActiveDataProvider([
            'query' => Nhatro::find(),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->render('index', [
            'listDmKkhuvuc' => $listDmKhuvuc,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionTest() {
        return $this->render('test');
    }
    /**
     * Displays a single Nhatro model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    /**
     * Creates a new Nhatro model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
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
    /**
     * Updates an existing Nhatro model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', [
                'id' => $model->id
            ]
            ]);
        }
        $listDmKhuvuc = Dmkhuvuc::find()->all();
        $listDmDoituong = Dmdoituong::find()->all();
        $listDmTienich = Dmtienich::find()->all();
        return $this->render('update', [
            'model' => $model,
            'listDmKhuvuc' => $listDmKhuvuc,
            'listDmDoituong' => $listDmDoituong,
            'listDmTienich' => $listDmTienich,
        ]);
    }

    /**
     * Deletes an existing Nhatro model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    public function actionDuyet($id) {
        return $this->render('duyet', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the Nhatro model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Nhatro the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Nhatro::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
