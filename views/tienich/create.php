<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tienich */

$this->title = 'Create Tienich';
$this->params['breadcrumbs'][] = ['label' => 'Tieniches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tienich-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
