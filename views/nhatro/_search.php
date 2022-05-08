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

   <div class="row">
        <div class="col-6"><?= $form->field($model, 'id') ?></div>
    
        <div class="col-6"><?= $form->field($model, 'ma') ?></div>
    
        <div class="col-6"><?= $form->field($model, 'dientich') ?></div>
    
        <div class="col-6"><?= $form->field($model, 'diachi') ?></div>
    
        <div class="col-6"><?php echo $form->field($model, 'tieude') ?></div>
    
        <div class="col-6"><?php echo $form->field($model, 'gia') ?></div>
   </div>


    <?php // echo $form->field($model, 'lat') ?>

    <?php // echo $form->field($model, 'lng') ?>

    <?php // echo $form->field($model, 'geom') ?>


    <?php // echo $form->field($model, 'mota') ?>

    <?php // echo $form->field($model, 'lienhe') ?>


    <?php // echo $form->field($model, 'doituong_id') ?>

    <?php // echo $form->field($model, 'thanhvien_id') ?>

    <?php // echo $form->field($model, 'tienich_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
