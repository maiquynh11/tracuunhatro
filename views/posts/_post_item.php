<?php
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\helpers\ArrayHelper;
use yii\widgets\LinkPager;
use \yii\data\ActiveDataProvider;
?>
<div class="item-border">
    <div class="slide-item row p-0">
        <div class="post-img col-md-4 pl-0">
            <div class="img-top position-relative">
                <img src="../img/room3.jpg" width="100%" alt="Avatar" class="image">
            </div>
        </div>
        <div class="post-text col-md-8 p-0">
            <div class="">
                <div class="row pb-2 post-user">
                    <div class="col-8">
                        <div class="time-user ">
                            <div class="flex-items">
                                <img src="../../img/car.jpg" alt="" class="avatar-cmt">
                            </div>
                            <div class="flex-items position-relative">
                                <div class="pl-2 text-bold pt-1">Mai Quỳnh</div>
                                <span class="text-time pl-2"><?=$model->updated_at?></span>
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
                <?= Html::a(StringHelper::truncateWords($model->tieude, 12), ['/posts/view', 'id' => $model->id]) ?>
            </div>
            <span class="post-price"><?= $model->gia ?></span>
            <div class="content-box">
                <div class="d-flex">
                    <div class="post-area d-flex">
                        <i class="fa-solid fa-ruler-combined icon-img"></i>
                        <span><?= $model->dientich ?></span>
                    </div>
                    <div class="post-address d-flex pb-1">
                        <i class="fa-solid fa-location-dot icon-img"></i>
                        <span><?= $model->diachi ?></span>
                    </div>
                </div>
                <span class="kc_nd"><?= StringHelper::truncateWords($model->mota, 30) ?>
            </div>
        </div>
    </div>
</div>