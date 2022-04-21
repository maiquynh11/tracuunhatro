<div class="bg-white"">
    <div class=" container pt-3">
    <?php if ($model) : ?>
    <div class="row">
        <div class="col-md-5 col detail-post">
            <div class="infor-post">
                <div class="row">
                    <div class="col-5">
                        <div class="rate-box d-flex pt-1">
                            <p class="" style="font-size: 30px; color: var(--detail-color)">4.9/5</p>
                            <div class="post-rate pl-3">
                                <ul id="stars" class=" d-flex p-0 list-unstyled mb-0">
                                    <li data-value="1" class="star pointer"><i class="fa fa-star"></i></li>
                                    <li data-value="2" class="star pointer"><i class="fa fa-star"></i></li>
                                    <li data-value="3" class="star pointer"><i class="fa fa-star"></i></li>
                                    <li data-value="4" class="star pointer"><i class="fa fa-star"></i></li>
                                    <li data-value="5" class="star pointer"><i class="fa fa-star"></i></li>
                                    <li class="pl-1">10</li>
                                </ul>
                            </div class="post-rate">
                        </div>
                        <div class="post-contact">
                            <!-- <span class="text-title">THÔNG TIN LIÊN HỆ</span> -->
                            <div class="pt-2">
                                <i class="fa-solid fa-user icon-img"></i>
                                <span class="post-user">Mai Quynh</span>
                            </div>
                            <div class="pb-3">
                                <i class="fa-solid fa-phone icon-img"></i>756859257298</span>
                            </div>
                            <div class="pb-1 border-title">
                                <i class="fa-solid fa-calendar-check icon-img"></i>21/3/2022</span>
                            </div>
                            <div class="pb-1">
                                <i class="fa-solid fa-comment icon-img"></i>Binh luận: 0
                            </div>
                            <div class="pb-3">
                                <i class="fa-solid fa-eye icon-img"></i>Lượt xem:
                            </div>
                            <div class="pb-1 d-flex">
                                <div  class="font-weight-bold border-title">Đánh giá ngay</div>                                
                                <div class="post-rate pt-4">
                                    <ul id="stars" class=" d-flex p-0 list-unstyled mb-0">
                                        <li data-value="1" class="star pointer"><i class="fa fa-star"></i></li>
                                        <li data-value="2" class="star pointer"><i class="fa fa-star"></i></li>
                                        <li data-value="3" class="star pointer"><i class="fa fa-star"></i></li>
                                        <li data-value="4" class="star pointer"><i class="fa fa-star"></i></li>
                                        <li data-value="5" class="star pointer"><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="font-weight-bold room-title pb-2">Thông tin phòng</div>
                        <div class="pb-1"><i class="fa-solid fa-location-dot icon-img"></i><?= $model->diachi ?>
                        </div>
                        <div class="pb-1"><i class="fa-solid fa-coins icon-img"></i><?= $model->gia ?></div>
                        <div class="pb-1"><i class="fa-solid fa-ruler icon-img"></i><?= $model->dientich ?></div>
                        <div class="pb-1"><i class="fa-solid fa-face-smile icon-img"></i>Sinh viên</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7 col slider">
            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="../img/room.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="../img/room2.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="../img/room3.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="../img/room2.jpg" />
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <div thumbsSlider="" class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="../img/room.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="../img/room2.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="../img/room3.jpg" />
                    </div>
                    <div class="swiper-slide">
                        <img src="../img/room2.jpg" />
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="design-post pt-4">
        <div class="post container">
            <div class="row">
                <div class="content-post col-md-8">
                    <div class="post-detail">
                        <div class="utilities-room">
                            <p class="text-title">Tiện ích</p>
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
                            <p class="text-title">Mô tả</p>
                            <p><?= $model->mota ?></p>
                            <div class="comments border-title"> 
                                <div class="d-flex">
                                    <div class="text-title">Bình luận</div>
                                    <span class="pl-3   ">100 bình luận</span>
                                </div>
                                <div class="create-comment mb-4 mt-4">
                                    <div class="media">                           
                                        <img class="mr-3 avatar-cmt" src="../img/room.jpg" alt="">
                                        <div class="media-body">
                                            <form class="create-comment-form"> 
                                                <input type="hidden" name="" value="">
                                                <textarea id="leave-comment" rows="1"  class="form-control comment-input w-100" name="comment" placeholder="Viết bình luận"></textarea>
                                                <div class="action-buttons text-right mt-2">
                                                    <button id="cancel-comment"  class="btn btn-light btn-cancel">Cancel</button>
                                                    <button id="submit-comment" class="btn btn-primary btn-save">Comment</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="comments-wrapper" class="comments-wrapper">
                                    <img class="mr-3 avatar-cmt" src="../img/room.jpg" alt="">
                                    <div class="media-body">       
                                        <a href="#" class="text-dark text-bold">maiquynh11</a>
                                        <small class="text-muted pl-2">2 phút trước</small>
                                    </div>
                                    <div class="comment-text">
                                        dfdgdf
                                    </div>
                                    <div class="comment-actions mt-2">
                                        <button class="btn btn-sm btn-light">Trả lời</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="post-map">
                        <!-- <i class="fa-solid fa-location-dot icon-img"></i> -->
                        <span class="text-title">Bản đồ</span>
                        <div class="map-box">
                            <div class="map-img">
                                <iframe
                                    src="https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
</div>
<script>

</script>