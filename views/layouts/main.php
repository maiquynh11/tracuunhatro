<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Button;
use yii\bootstrap4\ButtonDropdown;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/fontawesome.min.css"
        integrity="sha512-8Vtie9oRR62i7vkmVUISvuwOeipGv8Jd+Sur/ORKDD5JiLgTGeBSkI3ISOhc730VGvA5VVQPwKIKlmi+zMZ71w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="font/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.css">
    <link rel="stylesheet" href="font/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white ">
            <div class="container">
                <a class="navbar-brand pt-0" href="<?= Yii::$app->homeUrl ?>home">
                <img src="../img/lg1.png" alt="" width="100%">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav navbar-home">
                        <li class="nav-item active">
                            <!-- <a class="nav-link" href="<?= Yii::$app->homeUrl ?>home">Home
                                <span class="sr-only">(current)</span>
                            </a> -->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Bài đăng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tin mới</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Bản đồ</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0  ml-auto">
                        <div class="">              
                             <?php
                                    if(Yii::$app->user->isGuest) {
                                        echo Html::a('Đăng tin', ['/home/login'], ['class'=>'btn btn_post']);
                                    }
                                    else {
                                        echo Html::a('Đăng tin', ['/nhatro/index'], ['class'=>'btn btn_post']);
                                    }
                                ?>
                        </div>
                        <?php   
                            if (Yii::$app->user->isGuest) {                              
                                echo Html::a('Đăng nhập', ['/home/login'], ['class'=>'btn btn_login']);
                            } 
                            else {
                                echo ButtonDropdown::widget([
                                    'label' =>  Yii::$app->user->identity->getDisplayName(),
                                    'dropdown' => [
                                        'items' => [
                                            [
                                                'label' => 'Đăng xuất',
                                                'url' => ['/home/logout'],
                                                'linkOptions' => [
                                                    'data-method' => 'post'
                                                ],
                                            ],
                                            [
                                                'label' => 'Thông tin tài khoản',
                                                'url' => ['/home/logout'],
                                                'linkOptions' => [
                                                    'data-method' => 'post'
                                                ],
                                            ]
                                        ]
                                    ],
                                    'options' => ['class'=> 'btn btn_login-acc ']
                                ]);
                            }
                        ?>                     
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <main>
       
            <?= $content ?>
       
    </main>
    <footer class="footer mt-auto py-3 text-muted">
      
        </div>
    </footer>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
    integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
    crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
    integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
    crossorigin="">
    </script>
    <!-- <script src="font/OwlCarousel2-2.3.4/dist/JQuery3.3.1.js"></script> -->
    <script src="font/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous">
    </script>
    <script>
    $("#district-carousel .owl-carousel").owlCarousel({
        loop: true,
        center: true,
        margin: 30,
        nav: true,
        dots: true,
        navText: [
            `<button class="btn_prev">
                <i class="fa-solid fa-angle-left"></i>
            </button>`,
            `<button class="btn_next">
                <i class="fa-solid fa-angle-right"></i>
            </button>`,
        ],
        responsive: {
            0: {
                items: 3,
            },
            576: {
                items: 4,
            },
            1000: {
                items: 5,
            },
        },
    });
    $(".owl-carousel").find(".owl-nav").removeClass("disabled");
    $(".owl-carousel").on("changed.owl.carousel", function(event) {
        $(this).find(".owl-nav").removeClass("disabled");
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });
    </script>
    <script>
    var swiper = new Swiper(".mySwiper", {
        loop: true,
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".mySwiper2", {
        loop: true,
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        thumbs: {
            swiper: swiper,
        },
    });
    </script>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>