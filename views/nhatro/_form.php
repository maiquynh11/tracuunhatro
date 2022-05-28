<?php

use app\models\Dmkhuvuc;
use app\models\Dmtienich;
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
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], ]); ?>
       <div class="post_form-create">
            <div class="row">
                <div class="col-md-8 col-12">
                   <div class="border-post">
                        <div class="row p-3">
                            <div class="col-12">
                                <p class="text-bold">Tiêu đề bài đăng</p>
                                <?= $form->field($model, 'tieude')->textInput()->label(false) ?>
                            </div>
                            
                            <div class="col-12">
                            <p class="text-bold">Mô tả</p>
                                <?= $form->field($model, 'mota')->textInput()->widget(CKEditor::className(), [
                                    'options' => ['row' => 10],
                                    'preset' => 'basic'
                                ])->label(false) ?>   
                            </div>
                            <div class="col-6">
                                <p class="text-bold">Liên hệ</p>
                                <?= $form->field($model, 'lienhe')->textInput(['placeholder' => 'Số điện thoại'])->label(false) ?>
                            </div>
                           <div class="col-12">
                               <div id="map" style="min-height: 300px; width: 100%"></div>
                           </div>
                            <div class="col-12">
                                <?= $form->field($model, 'lat')->textInput(['id' => 'fieldLat']) ?>
                            
                                <?= $form->field($model, 'lng')->textInput(['id' => 'fieldLng']) ?>
                        
                            </div>
                            <!-- <p>Bản đồ</p> -->
                        </div>
                   </div>
                </div>
                <div class="col-md-4 col-12 pl-0">
                   <div class="border-post">
                        <div class="row p-3">
                            <div class="col-12">
                                <p class="text-bold">Chọn khu vực</p>
                                <?= $form->field($model, 'dmkhuvuc_id')->dropDownList(
                                    ArrayHelper::map(Dmkhuvuc::find()->all(), 'id', 'khuvuc')
                                )->label(false)?>
                            </div>
                            <div class="col-12">
                                <p class="text-bold">Địa chỉ
                                    <?= $form->field($model, 'diachi')->textInput()->label(false) ?>
                                </div>
                            <div class="col-12">
                            <p class="text-bold">Diện tích</p>
                                <?= $form->field($model, 'dientich')->textInput(['maxlength' => true])->label(false) ?>
                            </div>
                            <div class="col-12">
                                <p class="text-bold">Đối tượng sử dụng</p>
                                <?php $listNhatroDmdoituong = isset($listNhatroDmdoituong) ? $listNhatroDmdoituong : []?>
                                <?php foreach($listDmDoituong as $key => $dmDoituong): ?>
                                    <?php 
                                    // input duoc check khi dmDoituong->id bang voi bat ky doi tuong su dung nha tro
                                        $checked = "";
                                        foreach ($listNhatroDmdoituong as $nhatroDmdoituong) {
                                            if ($nhatroDmdoituong->doituong_id == $dmDoituong->id) {
                                                $checked = "checked";
                                                break;
                                            }
                                        }
                                    ?>
                                    <div class="form-check">
                                        <label class="form-check-label p-1">
                                            <input type="checkbox" <?= $checked ?> class="form-check-input" name="list_dmdoituong_id[]" id="" value="<?= $dmDoituong->id ?>">
                                            <?= $dmDoituong->ten ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div> 
                            <div class="col-12 pt-2">
                                <p class="text-bold pt-2">Tiện ích</p>
                                <div class="row pl-2">
                                    <?php $listDmTienichIdOfNhatro = isset($listDmTienichIdOfNhatro) ? $listDmTienichIdOfNhatro : []?>
                                    <?php foreach($listDmTienich as $key => $dmTienich):?>            
                                        <div class="col-6 p-1">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" <?= in_array($dmTienich->id, $listDmTienichIdOfNhatro) ? "checked" : "" ?> name="list_dmtienich_id[]" id="" value="<?=$dmTienich->id?>">
                                                    <?= $dmTienich->tienich ?>
                                                </label>
                                            </div>
                                        </div>
                                    <?php endforeach;?>
                                </div>
                            </div> 
                          
                        </div>
                   </div>
                </div>
            </div>           
       </div>
       <div class="form-group">
            <?= Html::submitButton('Đăng', ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
