<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Diemthuongmai */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="diemthuongmai-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ten')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diachi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phanloai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lng')->textInput() ?>

    <?= $form->field($model, 'lat')->textInput() ?>

    <?= $form->field($model, 'geom')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
