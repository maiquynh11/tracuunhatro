<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Binhluan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="binhluan-form">
    <?php $form = ActiveForm::begin([
         'id' => 'comment-form' ,
         'enableAjaxValidation' => true ,
    ]);?>

    <?= $form->field($model, 'noidung')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
