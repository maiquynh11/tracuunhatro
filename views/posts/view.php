<div class="container">
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../img/room.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../img/room.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../img/room.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleFade" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleFade" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>
    <script>
    $('.carousel').carousel()
    </script>
    <div class="design-post">
        <?php if($model) :?>
        <p class="post-title">
            <i class="fa-solid fa-hand-point-right pr-2"></i><?=$model->tieude?>
        </p>
        <div class="post container">
            <div class="row">
                <div class="content-post col-md-8">
                    <div class="post-detail">
                        <div class="infor-post">
                            <p class="text-title">THÔNG TIN PHÒNG</p>
                            <div class="row">
                                <li class="col-4">
                                    <span class="uti-title">GIÁ PHÒNG</span>
                                    <p><?=$model->gia?></p>
                                </li>
                                <li class="col-4">
                                    <span class="uti-title">DIỆN TÍCH</span>
                                    <p><?=$model->dientich?></p>
                                </li>
                                <li class="col-4">
                                    <span class="uti-title">ĐỊA CHỈ</span>
                                    <p><?=$model->diachi?></p>
                                </li>
                                <li class="col-4">
                                    <span class="uti-title">ĐÓI TƯỢNG SỬ DỤNG</span>
                                    <p>Sinh viên</p>
                                </li>
                            </div>
                        </div>
                        <div class="utilities-room">
                            <p class="text-title">TIỆN ÍCH</p>
                            <div class="row">
                                <li class="utilities-detail col-md-4">
                                    <i class="fa-solid fa-wifi icon-img"></i>
                                    <span class="">Wifi</span>
                                </li>
                                <li class="utilities-detail col-md-4">
                                    <i class="fa-solid fa-dungeon icon-img"></i>
                                    <span class="">Cửa sổ</span>
                                </li>
                                <li class="utilities-detail col-md-4">
                                    <i class="fa-solid fa-stairs icon-img"></i>
                                    <span class="">Gác</span>
                                </li>
                                <li class="utilities-detail col-md-4">
                                    <i class="fa-solid fa-motorcycle icon-img"></i>
                                    <span class="">Chỗ để xe</span>
                                </li>
                                <li class="utilities-detail col-md-4">
                                    <i class="fa-solid fa-faucet icon-img"></i>
                                    <span class="">Nhà bếp</span>
                                </li>
                            </div>
                        </div>
                        <div class="detail-post">
                            <p class="text-title">MÔ TẢ</p>
                            <p><?=$model->mota?></p>
                        </div>
                        <div class="comment-box">
                            <p class="text-title">BÌNH LUẬN</p>
                            <div class="card card-body mt-1 card-cmt">
                                <div class="group-cmt">
                                    <div class="input-group">
                                        <div class="pr-2">
                                            <img src="../img/car.jpg" alt="" class="avatar-cmt">
                                        </div>
                                        <input type="search" class="form-control rounded w-50"
                                            placeholder="Viết bình luận" aria-label="Search"
                                            aria-describedby="search-addon" />
                                    </div>
                                    <div class="d-flex cmt-user">
                                        <div class="pr-2">
                                            <img src="../img/car.jpg" alt="" class="avatar-cmt">
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
                </div>
                <div class="col-md-4">
                    <div class="post-contact">
                        <span class="text-title">THÔNG TIN LIÊN HỆ</span>
                        <div class="pt-2">
                            <i class="fa-solid fa-user icon-img"></i>
                            <span class="post-user">Mai Quynh</span>
                        </div>
                        <div class="contact-detail">
                            SĐT:<span class="phone ml-3">756859257298</span>
                        </div>
                    </div>
                    <div class="post-map bg-white">
                        <!-- <i class="fa-solid fa-location-dot icon-img"></i> -->
                        <span class="text-title">BẢN ĐỒ</span>
                        <div class="map-box">
                            <div class="map-img">
                                <iframe
                                    src="https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="rate-box">
                        <p class="text-title">ĐÁNH GIÁ</p>
                        <div class="post-rate pl-3">
                            <ul id="stars" class=" d-flex p-0 list-unstyled mb-0">
                                <span class="pr-2">Đánh giá:</span>
                                <li data-value="1" class="star pointer"><i class="fa fa-star"></i></li>
                                <li data-value="2" class="star pointer"><i class="fa fa-star"></i></li>
                                <li data-value="3" class="star pointer"><i class="fa fa-star"></i></li>
                                <li data-value="4" class="star pointer"><i class="fa fa-star"></i></li>
                                <li data-value="5" class="star pointer"><i class="fa fa-star"></i></li>
                            </ul>
                        </div class="post-rate">
                    </div>
                </div>
            </div>
        </div>
        <?php endif;?>
    </div>
</div>