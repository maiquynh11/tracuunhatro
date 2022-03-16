<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Nhatro */

$this->title = 'Update Nhatro: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nhatros', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nhatro-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
