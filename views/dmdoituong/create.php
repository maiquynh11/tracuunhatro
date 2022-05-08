<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dmdoituong */

$this->title = 'Create Dmdoituong';
$this->params['breadcrumbs'][] = ['label' => 'Dmdoituongs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dmdoituong-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
