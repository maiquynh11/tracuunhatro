<?php

use app\models\Dmkhuvuc;
use app\models\Nhatro;
use app\models\Binhluan;
use app\models\VNhatroDmkhuvuc;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\helpers\ArrayHelper;
use app\models\User;
?>
<div class="banner position-relative">
    <div class="banner_icon">
        <img src="img/banner.png" width="100%" alt="">
    </div>
    <div class="banner_text pt-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="289" height="15" viewBox="0 0 289 15">
            <text id="Kênh_thông_tin_hàng_đầu_về_phòng_trọ_" data-name="Kênh thông tin hàng đầu về phòng trọ " transform="translate(289 11)" fill="#caebf1" font-size="13" font-family="CourierNewPSMT, Courier New">
                <tspan x="-288.647" y="0">Kênh thông tin hàng đầu về phòng trọ </tspan>
            </text>
        </svg>


    </div>
    <div class="banner-form">
        <?php $bannerForm = ActiveForm::begin(['method' => 'get', 'id' => 'formFilterTop']) ?>
        <div class="flex-box banner-form_find">
            <div class="flex-item text-center">
                <i class="fa-solid fa-location-dot"></i>
                <div class="banner-form-title">Khu vực</div>
                <div class="form_ma">
                    <?= $bannerForm->field($homeSearchForm, 'dmkhuvuc_id')->dropdownList(ArrayHelper::map($listDmkhuvuc, 'id', 'khuvuc'))->label(false) ?>
                </div>
            </div>
            <div class="flex-item text-center">
                <i class="fa-solid fa-magnifying-glass-dollar"></i>
                <div class="banner-form-title">Mức giá</div>
                <div class="form_ma">
                    <?= $bannerForm->field($homeSearchForm, 'dmgia_id')->dropdownlist(ArrayHelper::map($listDmgia, 'id', 'mucgia'))->label(false) ?>
                </div>
            </div>
            <div class="flex-item text-center">
                <i class="fa-solid fa-map-location-dot"></i>
                <div class="banner-form-title">Đối tượng</div>
                <div class="form_ma">
                    <?= $bannerForm->field($homeSearchForm, 'dmdoituong_id')->dropdownlist(ArrayHelper::map($listDmdoituong, 'id', 'ten'))->label(false) ?>
                </div>
            </div>
            <div class="flex-item text-center">
                <i class="fa-solid fa-layer-group"></i>
                <div class="banner-form-title">Diện tích</div>
                <div class="form_ma">
                    <?= $bannerForm->field($homeSearchForm, 'dmdientich_id')->dropdownList(ArrayHelper::map($listDmdientich, 'id', 'dientich'))->label(false) ?>
                </div>
            </div>
        </div>
        <div class="search-input_form active-cyan">
            <?= $bannerForm->field($homeSearchForm, 'query')->textInput(['maxlength' => '255', 'class' => 'search-input', 'placeholder' => 'Search'])->label(false) ?>
        </div>
        <button type="submmit" class="btn btn-search">Tra
            cứu</button>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<div class="district container">
    <div class="district-title text-title text-center pb-2">
        <div class="pt-5">KHU VỰC</div>
        <svg xmlns="http://www.w3.org/2000/svg" width="29" height="9" viewBox="0 0 29 9">
            <g id="Group_8" data-name="Group 8" transform="translate(-206 -473.982)">
                <path id="Path_13" data-name="Path 13" d="M0,0H9V8.982H0Z" transform="translate(206 474)" fill="#1a94ff" />
                <path id="Path_14" data-name="Path 14" d="M0,0H9V8.982H0Z" transform="translate(226 474)" fill="#f2f265" />
                <rect id="Rectangle_17" data-name="Rectangle 17" width="9" height="9" transform="translate(216 473.982)" fill="#ff424e" />
            </g>
        </svg>
    </div>
    <div id="district-carousel">
        <div class="owl-carousel owl-theme">
            <?php foreach ($listDmkhuvuc as $khuvuc) : ?>
                <div class="carousel-items">
                    <div class="row">
                        <div class="col-md-6 col-12 p-0">
                            <div class="img-circle">
                                <img src="img/room.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-md-6 col-12 p-0">
                            <div class="district-name pl-2">
                                <?= Html::a(StringHelper::truncateWords($khuvuc->khuvuc, 12), ['/posts/show', 'id' => $khuvuc->id]) ?>
                            </div>
                            <small class="pl-2 post-qtt">
                                <span style="color: var(--detail-color)">
                                    <?php $countKhuvuc = Nhatro::find()->where(['dmkhuvuc_id' => $khuvuc->id])->count();
                                    echo $countKhuvuc;
                                    ?>
                                </span>bài đăng
                            </small>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</div>
<div class="content container" id="content">
    <div class="row">
        <div class="content-post col-md-8 bg-white">
            <div class="content-text">
                <p class="text-title">DANH SÁCH TIN ĐĂNG</p>
            </div>
            <div class="post-arrange">
                <span class="font-font-weight-bold"><i class="fa-solid fa-arrow-up-wide-short icon-img"></i>Sắp
                    xếp:</span>
                <a href="" class="pr-2 pl-2">Mặc định</a>
                <a href="">Mới nhất</a>
            </div>
            <?php foreach ($listNhatro as $nhatro) : ?>
                <div class="item-border">
                    <div class="slide-item row p-0">
                        <div class="post-img col-md-4 pl-0">
                            <div class="img-top position-relative">
                                <img src="img/room3.jpg" width="100%" alt="Avatar" class="image">
                            </div>
                        </div>
                        <div class="post-text col-md-8 p-0">
                            <div class="">
                                <div class="row pb-2 post-user">
                                    <div class="col-8">
                                        <div class="time-user ">
                                            <div class="flex-items">
                                                <img src="../img/car.jpg" alt="" class="avatar-cmt">
                                            </div>
                                            <div class="flex-items position-relative">
                                                <div class="pl-2 text-bold pt-1">
                                                    <?php $user = User::find()->where(['id' => $nhatro->user_id])->one(); 
                                                        echo isset($user) ? $user->username : "";
                                                    ?>
                                                </div>
                                                <span class="text-time pl-2"><span><?= $nhatro->updated_at ?></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="d-flex">
                                            <div class="nhatro-countBinhluan">
                                                <i class="fa-solid fa-comment icon-comment"></i>
                                                <?php $countBinhluan = Binhluan::find()->where(['nhatro_id' => $nhatro->id])->count();
                                                echo $countBinhluan;
                                                ?>
                                            </div>
                                            <div class="post-rate ml-2">
                                                <div class="rating d-block">
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star check"></span>
                                                    <span class="fa fa-star check"></span>
                                                    <span class="vote pr-1">10</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="body-title">
                                <?= Html::a(StringHelper::truncateWords($nhatro->tieude, 12), ['/posts/view', 'id' => $nhatro->id]) ?>
                            </div>
                            <span class="post-price"><?= $nhatro->gia ?></span>
                            <div class="content-box">
                                <div class="d-flex">
                                    <div class="post-area d-flex">
                                        <i class="fa-solid fa-ruler-combined icon-img"></i>
                                        <span><?= $nhatro->dientich ?></span>
                                    </div>
                                    <div class="post-address d-flex pb-1">
                                        <i class="fa-solid fa-location-dot icon-img"></i>
                                        <span><?= $nhatro->diachi ?></span>
                                    </div>
                                </div>
                                <span class="kc_nd"><?= StringHelper::truncateWords($nhatro->mota, 30) ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="content-right col-md-4">
            <div class="content-filter bg-white">
                <p class="text-title pl-3">BỘ LỌC NÂNG CAO</p>
                <form id="formFilterSidebar1">
                    <div id="sidebar">
                        <ul class="list-unstyled components">
                            <li>
                                <a href="#area-dropdown" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle p-3">
                                    <span class="area-title">KHU VỰC</span>
                                </a>
                                <ul class="collapse list-unstyled pl-4 pr-2" id="area-dropdown">
                                    <li class="area-text">
                                        <div class="row">
                                            <?php foreach ($listDmkhuvuc as $kv) { ?>
                                                <div class="col-6 p-2">
                                                    <input class="ele-click-to-filter1" type="checkbox" name="dmkhuvuc_id" value="<?= $kv['khuvuc'] ?>" ?>
                                                    <?= $kv['khuvuc']; ?>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </form>
                <form id="formFilterSidebar2">
                    <div id="sidebar">
                        <ul class="list-unstyled components">
                            <li>
                                <a href="#size-dropdown" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle p-3">
                                    <span class="size-title">DIỆN TÍCH</span>
                                </a>
                                <ul class="collapse list-unstyled pl-4 pr-2" id="size-dropdown">
                                    <li class="size-text">
                                        <?php foreach ($listDmdientich as $dmDientich) { ?>
                                            <div class="p-1">
                                                <input class="ele-click-to-filter2" type="radio" name="dmdientich_id" value="<?= $dmDientich['dientich'] ?>" ?>
                                                <?= $dmDientich['dientich']; ?>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </form>
                <form id="formFilterSidebar3">
                    <div id="sidebar">
                        <ul class="list-unstyled components">
                            <li>
                                <a href="#price-dropdown" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle p-3">
                                    <span class="price-title">MỨC GIÁ</span>
                                </a>
                                <ul class="collapse list-unstyled pl-4 pr-2" id="price-dropdown">
                                    <li class="price-text">
                                        <?php foreach ($listDmgia as $dmGia) { ?>
                                            <div class="p-1">
                                                <input class="ele-click-to-filter3" type="radio" name="dmgia_id" value="<?= $dmGia['mucgia'] ?>" ?>
                                                <?= $dmGia['mucgia']; ?>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </form>
                <form id="formFilterSidebar4">
                    <div id="sidebar">
                        <ul class="list-unstyled components">
                            <li>
                                <a href="#utilities-dropdown" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle p-3">
                                    <span class="utilities-title">TIỆN ÍCH</span>
                                </a>
                                <ul class="collapse list-unstyled pl-4 pr-2" id="utilities-dropdown">
                                    <li class="utilities-text">
                                        <?php foreach ($listDmtienich as $dmTienich) { ?>
                                            <div class="p-1">
                                                <input class="ele-click-to-filter4" type="checkbox" name="tienich_id" value="<?= $dmTienich['tienich'] ?>" ?>
                                                <?= $dmTienich['tienich']; ?>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
            <div class="post-new mt-3 pl-3 pr-3" style="background-color: white;">
                <p class="text-title">TIN MỚI</p>
                <?php foreach ($listNewPost as $nhatro) : ?>
                    <div class="card card_post-new">
                        <img class="card-img-top" src="img/room.jpg">
                        <div class="card-body">
                            <div class="post-new_nd">
                                <div class="d-flex">
                                    <div class="flex-items">
                                        <img src="../img/car.jpg" alt="" class="avatar-cmt-new">
                                        <span class="pl-1 text-bold">
                                            <?php $user = User::find()->where(['id' => $nhatro->user_id])->one(); 
                                                echo isset($user) ? $user->username : "";
                                            ?>
                                        </span>
                                    </div>
                                    <small>
                                        <i class="fa-solid fa-clock icon-img ml-2 mt-1"></i><span><?= $nhatro->updated_at ?></span>
                                    </small>
                                </div>
                                <div class="post-new_kc body-title pt-1">
                                    <?= Html::a(StringHelper::truncateWords($nhatro->tieude, 12), ['/posts/view', 'id' => $nhatro->id]) ?>
                                </div>
                                <span class="kc_nd"><?= StringHelper::truncateWords($nhatro->mota, 20) ?>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var homeUrl = '<?= Yii::$app->homeUrl ?>home';

        function getAllParamWithForm() {
            let result = '';
            $('form').each(function(id, form) {
                let param = $(form).serialize();
                result += '&' + param;
            });
            return result;
        }
        $('.ele-click-to-filter1').each(function(idx, ele) {
            let $this = $(ele);
            $this.on('click', function() {
                ////
                window.location.href = homeUrl + '?' + getAllParamWithForm();
            });
        });
        $('.ele-click-to-filter2').each(function(idx, ele) {
            let $this = $(ele);
            $this.on('click', function() {
                ////
                window.location.href = homeUrl + '?' + getAllParamWithForm();
            });
        });
        $('.ele-click-to-filter3').each(function(idx, ele) {
            let $this = $(ele);
            $this.on('click', function() {
                ////
                window.location.href = homeUrl + '?' + getAllParamWithForm();
            });
        });
        $('.ele-click-to-filter4').each(function(idx, ele) {
            let $this = $(ele);
            $this.on('click', function() {
                ////
                window.location.href = homeUrl + '?' + getAllParamWithForm();
            });
        });
    });
</script>
<script>
    
   $('#input-id').on('rating:change', function(event, value, caption) {
    console.log(value);
    console.log(caption);
});
</script>