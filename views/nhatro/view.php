<?php

use app\models\Dmkhuvuc;
use app\models\VNhatroDmdoituong;
use app\models\VNhatroDmtienich;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Nhatro */

$this->title = $model->ma;
$this->params['breadcrumbs'][] = ['label' => 'Quản lý tin đăng', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$khuvucs = Dmkhuvuc::find()->where(['khuvuc' => $model->id]);
?>
<div class="nhatro-view">

   <div class="d-flex justify-content-between p-2">
        <h5>Mã bài đăng: <?= Html::encode($this->title) ?></h5>
        <div class="btn-view">
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Bạn có chắc muốn xóa bài đăng ?',
                    'method' => 'post',
                ],
            ]) ?>
        </div>    
   </div>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ma',
            'dientich',
            'diachi',
            'tieude',
            'mota:html',
            'lienhe',
            'gia',
            [
                'attribute' => 'dmkhuvuc_id',
                'value' => function($model) {
                    $listDmKhuvuc = Dmkhuvuc::find()->where(['id' => $model->dmkhuvuc_id])->all();
                    foreach ($listDmKhuvuc as $dmKhuvuc) {
                        return $dmKhuvuc->khuvuc;
                    }
                }, 
            ],
          
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => function() use ($model) {
                    return Html::tag('span', $model->status ? 'Đã duyệt' : 'Đang chờ duyệt', [
                        'class' => $model->status ? 'badge badge-success' : 'badge badge-danger',                     
                    ]);
                }
            ],
            [
                'label' => 'Tiện ích',
                'attribute' => 'dmtienich_id',
                'value' => function($model) {
                    $listDmTienich = VNhatroDmtienich::find()->where(['nhatro_id' => $model->id])->all();
                    $result = "";
                    foreach ($listDmTienich as $dmTienich) {
                        $result .= '- ' .$dmTienich->tienich .' ';
                    }
                    return $result;
                }   
            ],
            [
                'label' => 'Đối tượng',
                'attribute' => 'dmdoituong_id',
                'value' => function($model) {
                    $listDmDoituong = VNhatroDmdoituong::find()->where(['nhatro_id' => $model->id])->all();
                    $result = "";
                    foreach ($listDmDoituong as $dmDoituong) {
                        $result .= '- ' .$dmDoituong->ten .' ';
                    }
                    return $result;
                }   
            ],
            'createdBy.username',
            'updatedBy.username',
            // 'thanhvien_id',
            // 'tienich_id',
            'lat',
            'lng',
            // 'geom',
         
        ], 
    ]) ?>

</div>
