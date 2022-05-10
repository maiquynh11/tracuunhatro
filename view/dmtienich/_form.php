<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Dmtienich */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dmtienich-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ma')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tienich')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
