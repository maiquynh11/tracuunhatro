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
use app\models\Diemthuongmai;
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
            return [
                'access' => [
                    'class' => AccessControl::className(),
                    'only' => ['logout'],
                    'rules' => [
                        [
                            'actions' => ['logout'],
                            'allow' => true,
                        ],
                        [
                            'allow' => true,
                            'roles' => ['@'],
                            'matchCallback' => function ($rule, $action) {
                                // if (Yii::$app->user->can('admin')) {
                                //     return true;
                                // }
                            }
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'logout' => ['post', 'get'],
                        'delele' => ['post']
                    ],
                ],
            ];
        }
    
        /**
         * {@inheritdoc}
         */
        public function actions()
        {
            return [
                'error' => [
                    'class' => 'yii\web\ErrorAction',
                ],
                'captcha' => [
                    'class' => 'yii\captcha\CaptchaAction',
                    'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                ],
            ];
        }
    
        public function actionGetlistjson() {
            // json, ajax, vuejs
            $data = Yii::$app->request;
            $query = Nhatro::find()->where('1=1');
            // $dmTienich = Dmtienich::find();

            $q = $data->get('q');
            if (isset($q) && !empty($q)) {
                $query->andWhere(['ilike', 'tieude', $q]);
            }
            
            
            $listKhuvucId = $data->get('listKhuvucId');
            if ($listKhuvucId && is_array($listKhuvucId)) {
                $query->andWhere(['in','dmkhuvuc_id', $listKhuvucId]);
            }

            $listDoituongId = $data->get('listDoituongId');
            if ($listDoituongId && is_array($listDoituongId)) {
                $listNhatroIdHaveDoituong = NhatroDmdoituong::find()->where(['in', 'doituong_id', $listDoituongId])->select('nhatro_id')->column();
                $query->andWhere(['in', 'id', $listNhatroIdHaveDoituong]);
            }

            $listTienichId = $data->get('listTienichId');
            if ($listTienichId && is_array($listTienichId)) {
                $listNhatroIdHaveTienich = NhatroDmtienich::find()->where(['in', 'tienich_id', $listTienichId])->select('nhatro_id')->column();
                $query->andWhere(['in', 'id', $listNhatroIdHaveTienich]); 
            }

            $geoFilterType = $data->get('geoFilterType');
            if (isset($geoFilterType) && !empty($geoFilterType)) {
                if ($geoFilterType == 'circle') {
                    $lat = $data->get('lat');
                    $lng = $data->get('lng');
                    $radius = $data->get('radius');
                    // 4326 latlng, 32648 metter => WGS84 UTM   
                    $query->andWhere("st_distance(st_transform(geom, 32648), st_transform(st_geomfromtext('POINT($lng $lat)', 4326), 32648)) <= $radius");
                   
                }
            }

            
            $listNhatro = $query->asArray()->all();
            return json_encode($listNhatro);
        }
        public function actionGetlistdiemthuongmaijson() {
            // $bankinh = Yii::$app->request->get('bankinh');
            // $nhatroDiemthuongmai = Nhatro::find()->where([])->select('geom');
            // $diemthuongmai = Diemthuongmai::find()->where("st_distance(st_transform(geom, 32648), st_transform($nhatroDiemthuongmai, 32648)) <= $bankinh");
            $data = Yii::$app->request;
            $q = Diemthuongmai::find()->where('1=1');

            $geoFilterType = $data->get('geoFilterType');
            if (isset($geoFilterType) && !empty($geoFilterType)) {
                if ($geoFilterType == 'circle') {
                    $lat = $data->get('lat');
                    $lng = $data->get('lng');
                    $radius = $data->get('radius');
                    // 4326 latlng, 32648 metter => WGS84 UTM   
                    $q->andWhere("st_distance(st_transform(geom, 32648), st_transform(st_geomfromtext('POINT($lng $lat)', 4326), 32648)) <= $radius");
                }       

            }
            $listDiemthuongmai = $q->asArray()->all();

            return json_encode($listDiemthuongmai);
        }
        public function actionGetdetailjson($id) {  
            // $data = Yii::$app->request;
            // $q = Diemthuongmai::find()->where('1=1')->select('geom');
            $nhatro = Nhatro::find()->where(['id' => $id])->asArray()->one();
            
            // // $geom->select('geom')->from()
            // $bankinh = Yii::$app->request->get('bankinh');

            // $geoFilterType = $data->get('geoFilterType');
            // if (isset($geoFilterType) && !empty($geoFilterType)) {
            //     if ($geoFilterType == 'circle') {
            //         $geom = $data->get('geom');
            //         $bankinh = $data->get('bankinh');
            //         // 4326 latlng, 32648 metter => WGS84 UTM   
            //         $nhatro->andWhere("st_distance(st_transform($q, 32648), st_transform(st_geomfromtext($geom), 4326), 32648)) <= $bankinh")->asArray();
            //     }       

            // }
          
            return json_encode($nhatro);
        }
        public function actionGettienichjson() {
            $listTienich = Dmtienich::find()->asArray()->all();

            return json_encode($listTienich);
        }
        public function actionGetdoituongjson() {
            $listDoituong = Dmdoituong::find()->asArray()->all();
            return json_encode($listDoituong);
        }
        public function actionGetkhuvucjson() {
            $listKhuvuc = Dmkhuvuc::find()->asArray()->all();
            return json_encode($listKhuvuc);
        }
        /**
         * Lists all Nhatro models.
         *
         * @return string
         */
        public function actionIndex()
        {
            $searchModel = new NhatroSearch();
            // $query = Nhatro::find()->where(['user_id'=> Yii::$app->user->id]);
            $query = Nhatro::find();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->setPagination([
                // 'query' => $query,
                'pageSize' => 10,
                'forcePageParam' => false,
                'pageSizeParam' => false
            ]);
            $dataProvider->setSort([
                'defaultOrder' => ['id' => SORT_ASC],
            ]);
            // $dataProvider = new ActiveDataProvider([
            //     'query' => $query,
            //     'pagination' => [
            //         'pageSize' => 20,
            //     ],
            //     'sort' => [
            //         'defaultOrder' => [
            //             'id' => SORT_ASC,
            //         ]
            //     ],
            // ]);
            return $this->render('index', [
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
                    ///// update nhatro where id=nhatro.id set geom = st_geomfromtext('POINT(lng lat)', 4326)'
                    // Yii::$app->db->createCommand("UPDATE nhatro.id SET geom = ST_GeomFromText('POINT(lng lat)', 4326) WHERE id = nhatro.id")->execute();          
                  
                  
                    Yii::$app->session->addFlash('success', 'Đã đăng !');
                    return $this->redirect(['view', 'id' => $model->id]);
                }
                else {
                    Yii::$app->session->addFlash('danger', 'Không hợp lệ !');
                    return $this->render('create', ['model' => $model->id]);
                }
            }
            $listDmDoituong = Dmdoituong::find()->all();
            $listDmKhuvuc = Dmkhuvuc::find()->all(); 
            $listDmTienich = Dmtienich::find()->all();
            return $this->render('create', [
                'model' => $model, 
                'listDmDoituong' => $listDmDoituong,
                'listDmKhuvuc' => $listDmKhuvuc,
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
            if ($model->load(Yii::$app->request->post())) {
                if ($model->save()) {
                    NhatroDmdoituong::deleteAll(['nhatro_id' => $model->id]);
                    $listDmDoituongId = Yii::$app->request->post('list_dmdoituong_id');
                    foreach ($listDmDoituongId as $dmDoituongId) {
                        $nhatroDmDoituong = new NhatroDmdoituong();
                        $nhatroDmDoituong->nhatro_id = $model->id;
                        $nhatroDmDoituong->doituong_id = $dmDoituongId;
                        $nhatroDmDoituong->save();
                    } 
                    NhatroDmtienich::deleteAll(['nhatro_id' => $model->id]);
                    $listDmTienichId = Yii::$app->request->post('list_dmtienich_id');      
                    foreach ($listDmTienichId as $dmTienichId) {
                        $nhatroDmTienich = new NhatroDmtienich();
                        $nhatroDmTienich->nhatro_id = $model->id;
                        $nhatroDmTienich->tienich_id = $dmTienichId;
                        $nhatroDmTienich->save();
                    }    
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
            // De tim danh sach doi tuong cua nha tro, nhatro -> nhatroDmdoituong -> doituong.
            // Tim trong bang Dmdoituong nhatro_id = $id
            // Dua danh sach len view
            // nhatro - doituong => ddddx
    
            $listNhatroDmDoituong = NhatroDmdoituong::find()->where(['nhatro_id' => $id])->all();
            $listNhatroDmTienich = NhatroDmtienich::find()->where(['nhatro_id' => $id])->all();
            $listDmTienichIdOfNhatro = [];
            foreach ($listNhatroDmTienich as $nhatroDmTienich) {
                array_push($listDmTienichIdOfNhatro, $nhatroDmTienich->nhatro_id);
            }
            
            $listDmKhuvuc = Dmkhuvuc::find()->all();
            $listDmDoituong = Dmdoituong::find()->all();
            $listDmTienich = Dmtienich::find()->all();
            return $this->render('update', [
                'model' => $model, 
                'listDmKhuvuc' => $listDmKhuvuc,
                'listDmDoituong' => $listDmDoituong,
                'listDmTienich' => $listDmTienich,
                'listNhatroDmDoituong' => $listNhatroDmDoituong,
                'listDmTienichIdOfNhatro' => $listDmTienichIdOfNhatro,
                'listNhatroDmTienich' => $listNhatroDmTienich
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
            $model = $this->findModel($id);
    
            if (Yii::$app->request->isPost) {
                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    return $this->redirect(['index', 'id' => $model->id]);
                }
            }

            return $this->render('duyet', [
                'model' => $model,
            ]);
        }
        public function actionInfor()
        {
            // Yii::$app->user->login();
            return $this->render('infor');
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