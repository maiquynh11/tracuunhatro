<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NhatroSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nhatro-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ma') ?>

    <?= $form->field($model, 'dientich') ?>

    <?= $form->field($model, 'diachi') ?>

    <?= $form->field($model, 'lat') ?>

    <?php // echo $form->field($model, 'lng') ?>

    <?php // echo $form->field($model, 'geom') ?>

    <?php // echo $form->field($model, 'tieude') ?>

    <?php // echo $form->field($model, 'mota') ?>

    <?php // echo $form->field($model, 'lienhe') ?>

    <?php // echo $form->field($model, 'gia') ?>

    <?php // echo $form->field($model, 'doituong_id') ?>

    <?php // echo $form->field($model, 'thanhvien_id') ?>

    <?php // echo $form->field($model, 'tienich_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
