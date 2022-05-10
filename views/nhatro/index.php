<?php

use app\models\VNhatroDmdoituong;
use app\models\VNhatroDmtienich;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\LinkPager;
use yii\models\Nhatro;
use yii\models\Dmkhuvuc;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NhatroSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quản lý tin đăng';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="nhatro-index">
    <div class="row justify-content-between">
        <h6 class="pl-3 font-font-weight-bold">DANH SÁCH TIN ĐĂNG</h6>
        <div class="d-flex">
            <div class="dropdown mr-2">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Lọc tin đăng
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Đã duyệt</a>
                    <a class="dropdown-item" href="#">Đang chờ duyệt</a>
                </div>
            </div>
            <div>
                <?= Html::a('Tạo bài đăng', ['create'], ['class' => 'btn btn-success']) ?>
            </div>
        </div>
        <div class="col">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'tableOptions' => ['class' => 'table table-bordered table-striped table-condensed'],
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'label' => 'id',
                            'attribute' => 'id',
                            'contentOptions' => [
                                'style' => 'width: 30px'
                            ]
                        ],
                        [
                            'attribute' => 'dientich',
                            'contentOptions' => [
                                'style' => 'width: 70px'
                            ]
                        ],
                        'diachi',
                        // 'lat',
                        //'lng',
                        //'geom',
                        'tieude',
                        [
                            'label' => 'Khu vực',
                            'attribute' => 'dmkhuvuc_id',
                            'value' => function($model) {
                                $listDmKhuvuc = app\models\Dmkhuvuc::find()->where(['id' => $model->dmkhuvuc_id])->all();
                                foreach ($listDmKhuvuc as $dmKhuvuc) {
                                    return $dmKhuvuc->khuvuc;
                                }
                            }   
                        ],
                        [
                            'attribute' => 'dmdoituong_id',
                            'content' => function($model) {
                                $listDmDoituong = VNhatroDmdoituong::find()->where(['nhatro_id' => $model->id])->all();
                                $result = "";
                                foreach ($listDmDoituong as $dmDoituong) {
                                    $result .= '- '. $dmDoituong->ten . '</br>';
                                }
                                return Html::tag('span', $result, []);
                            },
                        ],
                        [
                            'attribute' => 'dmtienich_id',
                            'content' => function($model) {
                                $listDmTienich = VNhatroDmtienich::find()->where(['nhatro_id' => $model->id])->all();
                                $result = "";
                                foreach ($listDmTienich as $dmTienich) {
                                    $result .= '- ' .$dmTienich->tienich .'</br>';
                                }
                                return Html::tag('span', $result, []);
                            }
                        ],
                        // 'mota',
                        'gia',
                        [
                            'attribute' => 'status',
                            'content' => function($model) {  
                                return Html::tag('span', $model->status ? 'Đã duyệt' : 'Đang chờ duyệt', [
                                    'class' => $model->status ? 'badge badge-success' : 'badge badge-danger',                     
                                ]);
                            },
                            'contentOptions' => ['style' => 'width: 70px;']
                            
                        ],
                        //'doituong_id',
                        //'thanhvien_id',     
                        [
                            'attribute' => 'created_at', 
                            'format' => 'datetime',
                            'contentOptions' => [
                                'style' => 'white-space: nowrap',
                            ]
                        ],
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'buttons' => [
                            'view' => function($url, $model) {
                                    return Html::a('', $url, ['class' => 'fa-solid fa-eye']);
                                },
                            'update' => function($url, $model) {
                                return Html::a('', $url, ['class' => 'fa-solid fa-edit']);
                            },
                            'delete' => function($url, $model) {
                                return Html::a('', $url, [
                                    'class' => 'fa-solid fa-trash', 
                                    'data-confirm' => 'Bạn có chắc chắn muốn xóa "' .$model->ma.'" không ? ',
                                    'data-method' => 'post',
                                ]);
                            } ,
                            'duyet' => function($url, $model) {
                                return Html::a('', $url, [
                                    'class' => 'fa-solid fa-pencil',
                                    'data-method' => 'post',
                                ]);
                            }  
                            ]
                        ],
                    ],
                ]); ?>
        </div>
    </div>   
</div>
