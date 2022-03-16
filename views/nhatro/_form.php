<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Nhatro */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nhatro-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'ma')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dientich')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diachi')->textInput() ?>

    <?= $form->field($model, 'lat')->textInput() ?>

    <?= $form->field($model, 'lng')->textInput() ?>

    <?= $form->field($model, 'geom')->textInput() ?>

    <?= $form->field($model, 'tieude')->textInput() ?>

    <?= $form->field($model, 'mota')->textInput()->widget(CKEditor::className(), [
        'options' => ['row' => 5],
        'preset' => 'basic'
    ]) ?>

    <?= $form->field($model, 'lienhe')->textInput() ?>

    <?= $form->field($model, 'gia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doituong_id')->textInput() ?>

    <?= $form->field($model, 'thanhvien_id')->textInput() ?>

    <?= $form->field($model, 'tienich_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>