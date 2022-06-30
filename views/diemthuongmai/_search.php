<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DiemthuongmaiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="diemthuongmai-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ten') ?>

    <?= $form->field($model, 'diachi') ?>

    <?= $form->field($model, 'phanloai') ?>

    <?= $form->field($model, 'lng') ?>

    <?php // echo $form->field($model, 'lat') ?>

    <?php // echo $form->field($model, 'geom') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
