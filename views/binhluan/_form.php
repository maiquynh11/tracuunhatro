<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Binhluan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="binhluan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'noidung')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'thanhvien_id')->textInput() ?>

    <?= $form->field($model, 'nhatro_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
