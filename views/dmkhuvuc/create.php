<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dmkhuvuc */

$this->title = 'Create Dmkhuvuc';
$this->params['breadcrumbs'][] = ['label' => 'Dmkhuvucs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dmkhuvuc-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
