<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\helpers\ArrayHelper;
?>
<div class="banner position-relative">
    <div class="banner_icon">
        <img src="img/logo.png" width="100%" alt="">
    </div>
    <div class="banner_text">
        <h3>jhfhkshfkhfshfdkjshđfgdgfgfgfgfgfgfgfgf</h3>
    </div>
    <div class="banner-form">
        <ul class="banner-form_find d-lg-flex d-lg-row flex-nowrap text-center">
            <li class="form_ma bg-white ">
                <select class="form-control bg-white">
                    <option value="" selected disabled>&nbsp;&nbsp;Khu vực</option>
                    <option>Quận 1</option>
                    <option>Quận 2</option>
                    <option>Quận 3</option>
                </select>
            </li>
            <li class="form_ma">
                <select class="form-control">
                    <option value="" selected disabled>&nbsp;&nbsp;Bản đồ</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                </select>
            </li>
            <li class="form_ma">
                <select class="form-control">
                    <option value="" selected disabled>&nbsp;&nbsp;Mức giá</option>
                    <?php foreach($dmgia as $item) :?>
                    <option value="<?=$item->id?>"><?=$item->mucgia?></option>
                    <?php endforeach;?>
                </select>
            </li>
            <li class="form_ma">
                <select class="form-control">
                    <option value="" selected disabled>&nbsp;&nbsp;Diện tích</option>
                    <?php foreach($dmdientich as $item) :?>
                    <option><?=$item->dientich?></option>
                    <?php endforeach;?>
                </select>
            </li>
        </ul>
        <form class="search-input active-cyan">
            <input type="text" placeholder="Search" aria-label="Search">
        </form>
        <button type="submmit" class="btn btn-search"><i class="fa-solid fa-magnifying-glass mr-2"></i>Tra cứu</button>
    </div>
</div>
<div class="container-fluid" style="background-color: #eeeeee">
    <div class="district container">
        <div class="district-title text-title text-center">
            <p class="pt-3">KHU VỰC</p>
        </div>
        <div id="district-carousel">
            <div class="owl-carousel owl-theme">
                <div class="carousel-items">
                    <div class="img-circle">
                        <img src="img/room.jpg" alt="">
                    </div>
                    <p class="district-name text-center">Quận 1</p>
                </div>
                <div class="carousel-items">
                    <div class="img-circle">
                        <img src="img/room.jpg" alt="">
                    </div>
                    <p class="district-name text-center">Quận 1</p>
                </div>
                <div class="carousel-items">
                    <div class="img-circle">
                        <img src="img/room.jpg" alt="">
                    </div>
                    <p class="district-name text-center">Quận 1</p>
                </div>
                <div class="carousel-items">
                    <div class="img-circle">
                        <img src="img/room.jpg" alt="">
                    </div>
                    <p class="district-name text-center">Quận 1</p>
                </div>
                <div class="carousel-items">
                    <div class="img-circle">
                        <img src="img/room.jpg" alt="">
                    </div>
                    <p class="district-name text-center">Quận 1</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content container pt-3">
    <div class="row">
        <div class="content-post col-md-8">
            <div class="content-text">
                <p class="text-title">DANH SÁCH TIN ĐĂNG</p>
            </div>
            <div class="post-arrange">
                <span class="font-font-weight-bold"><i class="fa-solid fa-arrow-up-wide-short icon-img"></i>Sắp
                    xếp:</span>
                <a href="" class="pr-2 pl-2">Mặc định</a>
                <a href="">Mới nhất</a>
            </div>
            <?php foreach($nhatro as $item) :?>
            <div class="item-border">
                <div class="slide-item row p-0">
                    <div class="post-img col-md-4 pl-0">
                        <div class="img-top position-relative">
                            <img src="img/business.jpg" width="100%" alt="Avatar" class="image">
                        </div>
                    </div>
                    <div class="post-text col-md-8 p-0">
                        <div class="">
                            <div class="row">
                                <div class="col-8">
                                    <div class="time-user ">
                                        <div class="flex-items">
                                            <img src="../img/car.jpg" alt="" class="avatar-cmt">
                                        </div>
                                        <div class="flex-items position-relative">
                                            <div class="pl-2">Mai Quỳnh</div>
                                            <span class="text-time pl-2">2<span>&nbspgiờ trước</span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="post-rate">
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
                        <div class="body-title">
                            <?=Html::a($item->tieude, ['/posts/view','id' => $item->id])?>
                        </div>
                        <span class="post-price"><?=$item->gia?></span>
                        <div class="content-box">
                            <div class="d-flex pb-1">
                                <div class="post-client d-flex">
                                    <i class="fa-solid fa-face-smile icon-img"></i>
                                    <span></span>
                                </div>
                                <div class="post-area d-flex">
                                    <i class="fa-solid fa-ruler-combined icon-img"></i>
                                    <span><?=$item->dientich?></span>
                                </div>
                            </div>
                            <div class="post-address d-flex pb-1">
                                <i class="fa-solid fa-location icon-img"></i>
                                <span><?=$item->diachi?></span>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="">
                        <div class="content-cmt">
                            <div class="left-gr pb-2">
                                <span class="comment pr-3" data-toggle="collapse" href="#collapseExample" role="button"
                                    aria-expanded="false" aria-controls="collapseExample"><i
                                        class="fa-solid fa-comment-dots icon-img"></i>Bình luận</span>
                                <span class="view"><i class="fa-solid fa-eye icon-img"></i>20</span>
                            </div>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body mt-1 card-cmt">
                                    <div class="group-cmt">
                                        <div class="input-group">
                                            <div class="pr-2">
                                                <img src="img/car.jpg" alt="" class="avatar-cmt">
                                            </div>
                                            <input type="search" class="form-control rounded w-50"
                                                placeholder="Viết bình luận" aria-label="Search"
                                                aria-describedby="search-addon" />
                                        </div>
                                        <div class="d-flex cmt-user">
                                            <div class="pr-2">
                                                <img src="img/car.jpg" alt="" class="avatar-cmt">
                                            </div>
                                            <div class="write-cmt">
                                                <div class="p-1">sdcsdfđFull nội thất, decor như hình,...và
                                                    nhiều ưu
                                                    đãi
                                                    mùa
                                                    dịchFull
                                                    nội thất, decor như hình,...và nhiều ưu đãi mùa dịchFull nội
                                                    thất,
                                                    decor
                                                    như
                                                    hình,...và nhiều ưu đãi mùa dịch</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <?php endforeach;?>
        </div>
        <div class="content-right col-md-4">
            <div class="content-filter" style="background-color: white;">
                <p class="text-title pl-3">BỘ LỌC NÂNG CAO</p>
                <div class="filter-pad p-2">
                    <div id="sidebar">
                        <ul class="list-unstyled components">
                            <li>
                                <a href="#area-dropdown" data-toggle="collapse" aria-expanded="false"
                                    class="dropdown-toggle">
                                    <span class="area-title">KHU VỰC</span></a>
                                <ul class="collapse list-unstyled row pl-3 pr-2" id="area-dropdown">
                                    <li class="col-6 area-text">
                                        <label class="filter-check">
                                            <span class="utilities-check">Quận 1</span>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li class="col-6 area-text">
                                        <label class="filter-check">
                                            <span class="utilities-check">Quận 2</span>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li class="col-6 area-text">
                                        <label class="filter-check">
                                            <span class="utilities-check">Quận 3</span>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li class="col-6 area-text">
                                        <label class="filter-check">
                                            <span class="utilities-check">Quận 4</span>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li class="col-6 area-text">
                                        <label class="filter-check">
                                            <span class="utilities-check">Quận 5</span>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li class="col-6 area-text">
                                        <label class="filter-check">
                                            <span class="utilities-check">Quận 6</span>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#price-dropdown" data-toggle="collapse" aria-expanded="false"
                                    class="dropdown-toggle">
                                    <span class="price-title">MỨC GIÁ</span></a>
                                <?php foreach($dmgia as $item) :?>
                                <ul class="collapse list-unstyled" id="price-dropdown">
                                    <li class="price-text">
                                        <label class="filter-check">
                                            <span class="utilities-check"><?=$item->mucgia?></span>
                                            <input type="checkbox" name="mucgia" value="<?=$item->id?>">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                </ul>
                                <?php endforeach;?>
                            </li>
                            <li>
                                <a href="#size-dropdown" data-toggle="collapse" aria-expanded="false"
                                    class="dropdown-toggle">
                                    <span class="size-title">DIỆN TÍCH</span></a>
                                <?php foreach($dmdientich as $item):?>
                                <ul class="collapse list-unstyled" id="size-dropdown">
                                    <li class="size-text">
                                        <label class="filter-check">
                                            <span class="utilities-check"><?=$item->dientich?></span>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                </ul>
                                <?php endforeach;?>
                            </li>
                            <li>
                                <a href="#utilities-dropdown" data-toggle="collapse" aria-expanded="false"
                                    class="dropdown-toggle">
                                    <span class="utilities-title">TIỆN ÍCH</span>
                                </a>
                                <ul class="collapse list-unstyled" id="utilities-dropdown">
                                    <?php foreach($tienich as $item) :?>
                                    <li class="utilities-text">
                                        <label class="filter-check">
                                            <i class="icon-img"></i>
                                            <span class="utilities-check"><?=$item->ten?></span>
                                            <input type="checkbox" id="">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <?php endforeach;?>
                                </ul>
                            </li>
                            <div class="text-center pt-4">
                                <button class="btn-btn-outline-danger btn-filter" type="submit">
                                    Áp dụng
                                </button>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="post-new mt-3 pl-3 pr-3" style="background-color: white;">
                <p class="text-title">TIN MỚI</p>
                <div class="card card_post-new">
                    <img class="card-img-top" src="img/room.jpg">
                    <div class="card-body">
                        <div class="post-new_nd">
                            <small>
                                <i class="fas fa-user icon-img"></i>Ahghj
                                <i class="fa-solid fa-clock icon-img ml-2"></i>2 phút trước
                            </small>
                            <div class="post-new_kc body-title">Phòng trọ giá rẻ</div>
                            <span class="kc_nd">Cho thuê Phòng trọ RẤT RỘNG VÀ ĐẸP CÓ GÁC LỬNG WC TRONG
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card_post-new">
                    <img class="card-img-top" src="img/business.jpg">
                    <div class="card-body">
                        <div class="post-new_nd">
                            <small>
                                <i class="fas fa-user icon-img"></i>Ahghj
                                <i class="fa-solid fa-clock icon-img ml-2"></i>2 phút trước
                            </small>
                            <div class="post-new_kc body-title">Phòng trọ giá rẻ</div>
                            <span class="kc_nd">Cho thuê Phòng trọ RẤT RỘNG VÀ ĐẸP CÓ GÁC LỬNG WC TRONG
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>