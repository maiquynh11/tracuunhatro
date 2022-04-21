<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Binhluan */

$this->title = 'Create Binhluan';
$this->params['breadcrumbs'][] = ['label' => 'Binhluans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="binhluan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
