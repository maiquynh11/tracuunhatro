<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dmdoituong */

$this->title = 'Update Dmdoituong: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dmdoituongs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dmdoituong-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
