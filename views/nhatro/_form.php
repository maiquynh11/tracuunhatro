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
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
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
                                <?php foreach($listDmDoituong as $key => $dmDoituong): ?>
                                    <div class="form-check">
                                        <label class="form-check-label p-1">
                                            <input type="checkbox" class="form-check-input" name="list_dmdoituong_id[]" id="" value="<?= $dmDoituong->id ?>">
                                            <?= $dmDoituong->ten ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>   
                            <div class="col-12 pt-2">
                                <p class="text-bold pt-2">Tiện ích</p>
                                <div class="row pl-2">
                                    <?php foreach($listDmTienich as $key => $dmTienich):?>            
                                        <div class="col-6 p-1">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="list_dmtienich_id[]" id="" value="<?=$dmTienich->id?>">
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
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
   integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
   crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
   integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
   crossorigin=""></script>
<script>
    var map = L.map('map').setView([10.824784072964595, 106.71169543218959], 11);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var markerLatLng = L.marker([10.824784072964595, 106.71169543218959], {
        draggable: true
    });
    markerLatLng.addTo(map);

    function updateLatLngFieldWithMarker() {
        var latlng = markerLatLng.getLatLng();
        $('#fieldLat').val(latlng.lat);
        $('#fieldLng').val(latlng.lng)
    }

    function updateMarketWithLatLngField() {
        let lat = $('#fieldLat').val();
        let lng = $('#fieldLng').val()
        markerLatLng.setLatLng(L.latLng(lat, lng));  
    }

    updateLatLngFieldWithMarker();
    markerLatLng.on('dragend', function(event) {
        updateLatLngFieldWithMarker();
    })

    $('#fieldLat, #fieldLng').on('change', function() {
        updateMarketWithLatLngField();
    })
</script>