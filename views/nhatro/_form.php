<?php

use app\models\Dmkhuvuc;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Nhatro;
use app\models\NhatroDmdoituong;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Nhatro */
/* @var $form yii\widgets\ActiveForm */

?>
<div class="nhatro-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
       <div class="post_form-create">
           <div class="row">
            <div class="col-6">
                    <?= $form->field($model, 'diachi')->textInput() ?>
                </div>
                <div class="col-6">
                    <?= $form->field($model, 'dientich')->textInput(['maxlength' => true]) ?>
                </div>
            <div class="col-12">
                <?= $form->field($model, 'tieude')->textInput() ?>
            </div>
            <div class="col-12">
                <?= $form->field($model, 'mota')->textInput()->widget(CKEditor::className(), [
                    'options' => ['row' => 5],
                    'preset' => 'basic'
                ]) ?>   
            </div>
            <div class="col-6">
                <?= $form->field($model, 'lienhe')->textInput() ?>
            </div>
            <div class="col-6">
            <div class="col-12">
                <?php foreach($listDmDoituong as $key => $dmDoituong): ?>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="list_dmdoituong_id[]" id="" value="<?= $dmDoituong->id ?>">
                        <?= $dmDoituong->ten ?>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>
            </div>
            <div class="col-12">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Khu vực</label>
                <select class="form-control" id="" name="dmkhuvuc_id" value="">
                <?php foreach($listDmkhuvuc as $dmkhuvuc ):?>
                    <option value="<?= $dmkhuvuc->id ?>"><?=$dmkhuvuc->khuvuc?></option>
                    <?php endforeach; ?>
                </select>
                
            </div>
            </div>
            <div class="col-12">
               
            </div>
            <div class="col-12">
                <?= $form->field($model, 'lat')->textInput() ?>
            
                <?= $form->field($model, 'lng')->textInput() ?>
            
                <?= $form->field($model, 'geom')->textInput() ?>
            </div>
            <!-- <p>Bản đồ</p> -->
            <div class="form-group">
                <?= Html::submitButton('Đăng', ['class' => 'btn btn-success']) ?>
            </div>
        </div>           
       </div>
    <?php ActiveForm::end(); ?>
</div>