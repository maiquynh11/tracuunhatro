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
<div class="container pt-3">
   <?php if ($model):?>
        <div class="row">
            <div class="col-md-3 sidebar-user pl-0 pr-0">
                <div class="avatar">
                    <img src="../img/car.jpg" alt="Avatar" class="avatar-circle">
                    <span class="infor-user pl-2">MAI QUYNH</span>
                    <!-- <p class="mail-user">mtquynh.1111@gmail.com</p> -->
                </div>
                <div class="create-title">
                    <div class="sidebar-title"><i class="fa-solid fa-paste pr-2 "></i>Quản lý bài đăng</div>
                    <div class="sidebar-title"><i class="fa-solid fa-user-pen pr-2"></i>Sửa thông tin cá nhân</div>
                    <div class="sidebar-title"><i class="fa-solid fa-right-from-bracket pr-2 "></i>Đăng xuất</div>
                </div>
            </div>
            <div class="col-md-9 create-post ">
                <!-- <p class="text-title">TẠO BÀI ĐĂNG</p> -->
                <div class="">
                    <p class="text-title mt-2">KHU VỰC</p>
                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], ]); ?>
                        <?= $form->field($model, 'dmkhuvuc_id')->dropDownList(
                                    ArrayHelper::map(Dmkhuvuc::find()->all(), 'id', 'khuvuc')
                                )->label(false)?>
                                 <?php ActiveForm::end(); ?>
                    <p class="text-title mt-2">DIỆN TÍCH</p>
                    <?= $form->field($model, 'dientich')->textInput(['maxlength' => true])->label(false) ?>
    
                    <p class="text-title mt-2">MỨC GIÁ CHO THUÊ</p>
                    <?= $form->field($model, 'gia')->textInput()->label(false) ?>
    
                </div>
                <div class="create-img">
                    <p class="text-title mt-2">HÌNH ẢNH</p>
                </div>
                <div class="create-contact">
                    <p class="text-title mt-2">THÔNG TIN LIÊN HỆ</p>
                    <input type="text" class="form-control" id="phone" placeholder="">
                </div>
                <div class="create-ulility">
                    <p class="text-title mt-2">ĐỐI TƯỢNG SỬ DỤNG</p>   
                    <?php $listNhatroDmDoituong = isset($listNhatroDmDoituong) ? $listNhatroDmDoituong : []?>
                    <?php foreach($listDmDoituong as $key => $dmDoituong): ?>
                        <?php 
                        // input duoc check khi dmDoituong->id bang voi bat ky doi tuong su dung nha tro
                            $checked = "";
                            foreach ($listNhatroDmDoituong as $nhatroDmDoituong) {
                                if ($nhatroDmDoituong->doituong_id == $dmDoituong->id) {
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
                <div class="create-ulility">
                    <p class="text-title mt-2">TIỆN ÍCH</p>
                    <?php $listNhatroDmTienich = isset($listNhatroDmTienich) ? $listNhatroDmTienich : []?>
                        <?php foreach($listDmTienich as $key => $dmTienich):?>            
                            <div class="col-6 p-1">
                                <?php
                                $checked = "";
                                foreach ($listNhatroDmTienich as $nhatroDmTienich) {
                                    if ($nhatroDmTienich->tienich_id == $dmTienich->id) {
                                        $checked = "checked";
                                        break;
                                    }
                                }
                                ?>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" <?=$checked?> name="list_dmtienich_id[]" id="" value="<?=$dmTienich->id?>">
                                        <?= $dmTienich->tienich ?>
                                    </label>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>
                <div class="create-img">
                    <p class="text-title mt-2">HÌNH ẢNH</p>
                </div>
                <div class="create-infor">
                    <p class="text-title mt-2">MÔ TẢ</p>
                    <?= $form->field($model, 'mota')->textInput()->widget(CKEditor::className(), [
                                    'options' => ['row' => 10],
                                    'preset' => 'basic'
                                ])->label(false) ?>   
                </div>
                <div class="create-contact">
                    <p class="text-title mt-2">THÔNG TIN LIÊN HỆ</p>
                    <?= $form->field($model, 'lienhe')->textInput()->label(false)?>
                </div>
                <button class="btn-danger btn mt-4" type="submit">
                    ĐĂNG TIN
                </button>
            </div>
        </div>
   <?php endif; ?>
</div>