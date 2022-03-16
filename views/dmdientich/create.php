<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dmdientich */

$this->title = 'Create Dmdientich';
$this->params['breadcrumbs'][] = ['label' => 'Dmdientiches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dmdientich-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
