<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Nhatro */
use app\models\Dmkhuvuc;

$this->params['breadcrumbs'][] = ['label' => 'Bài đăng', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nhatro-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
        'listDmKhuvuc' => $listDmKhuvuc,
        'listDmDoituong' => $listDmDoituong,
        'listDmTienich' => $listDmTienich,
    ]) ?>

</div>
