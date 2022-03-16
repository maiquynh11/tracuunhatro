<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
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
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="<?= Yii::$app->homeUrl ?>home">
                    <img src="img/logo.png" width="100%">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= Yii::$app->homeUrl ?>home">
                                <i class="fa-solid fa-house-chimney-window icon-img"></i>
                                <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Danh mục bài đăng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Bản đồ</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0  ml-auto">
                        <a href="<?= Yii::$app->homeUrl ?>posts/post">
                            <div class="btn btn_post">
                                <i class="fas fa-plus-circle mr-2"></i>Đăng tin
                            </div>
                        </a>
                        <a href="<?= Yii::$app->homeUrl ?>home/login">
                            <div class="btn my-2 my-sm-0 btn_login" type="submit">
                                Đăng nhập
                            </div>
                        </a>
                        <a href="<?= Yii::$app->homeUrl ?>home/signup" class="ml-2">
                            <div class="btn my-2 my-sm-0 btn_signup" type="submit">
                                </i>Đăng ký
                            </div>
                        </a>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container-fluid">
            <div class="col-3">
                <div style="height: 200px; background: black; width: 100%"></div>
            </div>
            <div class="col-9">
                <?= $content ?>
            </div>
        </div>
    </main>
    <footer class="footer mt-auto py-3 text-muted">
        <div class="container">
            <p class="float-left">&copy; My Company <?= date('Y') ?></p>
            <p class="float-right"><?= Yii::powered() ?></p>
        </div>
    </footer>
    <script src="font/OwlCarousel2-2.3.4/dist/JQuery3.3.1.js"></script>
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
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>