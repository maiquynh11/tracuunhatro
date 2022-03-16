<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dmdientich */

$this->title = 'Update Dmdientich: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dmdientiches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dmdientich-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
