<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Nhatro */

$this->title = 'Cập nhật bài đăng: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Quản lý tin đăng', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ma, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Cập nhật tin đăng';
?>
<div class="nhatro-update">

    <h6><?= Html::encode($this->title) ?></h6>

    <?= $this->render('_form', [
        'model' => $model,
        'listDmKhuvuc' => $listDmKhuvuc,
        'listDmDoituong' => $listDmDoituong,
        'listDmTienich' => $listDmTienich,
        'listNhatroDmDoituong' => $listNhatroDmDoituong,
        'listDmTienichIdOfNhatro' => $listDmTienichIdOfNhatro,
        'listNhatroDmTienich' => $listNhatroDmTienich,
    ]) ?>

</div>
