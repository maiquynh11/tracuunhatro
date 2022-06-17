<?php
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\helpers\ArrayHelper;
use yii\widgets\LinkPager;
use \yii\data\ActiveDataProvider;

?>

<div class="container">
    <div class="row">
        <div class="content-post col-md-8 bg-white">
            <div class="content-text">
                <p class="text-title">DANH SÁCH TIN ĐĂNG</p>           
            </div>
            <div class="post-arrange">
            <?= $sort->link('created_at') . ' | ' . $sort->link('default');   ?>
                <!-- <span class="font-font-weight-bold"><i class="fa-solid fa-arrow-up-wide-short icon-img"></i>Sắp
                    xếp:</span>
                <a href="" class="pr-2 pl-2">Mặc định</a>
                <a href="">Mới nhất</a> -->
            </div>
            <?= \yii\widgets\ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => '_post_item',
                    // 'layout' => '{summary}<div class="row">{items}</div>{pager}',
                    'itemOptions' => [
                        // 'class' => 'pl-4'
                    ],
                    'pager' => [
                        // 'firstPageLabel' => 'first',
                        // 'lastPageLabel' => 'last',
                        'prevPageLabel' => '<i class="fa-solid fa-chevron-left p-1"></i>',
                        'nextPageLabel' => '<i class="fa-solid fa-chevron-right p-1"></i>',
                
                        // Customzing options for pager container tag
                        'options' => [
                            'tag' => 'div',
                            'class' => 'd-flex page-css',
                        ],
                        'activePageCssClass' => ['class' => 'active-page'],
                        // Customzing CSS class for pager link
                        'linkOptions' => ['class' => 'page-item'],

                    ],
                ])?>
           
        </div>
    </div>
</div>
<style>
    .page-css {
        justify-content: center;
        text-align: center;
        text-decoration: none;
        margin-top: 10px;
        margin-bottom: 15px;
        /* border: 1px solid red;
        padding: 10px 0 10px 0; */
        /* width: 100px; */
    }
    .page-item {
        padding: 10px 15px 10px 15px;
        color:  #373737;
    }
    .page-item:hover {
        background-color: rgb(26, 148, 255);
        color: white;
        text-decoration: none;  
    }
    .active-page a{
        color: white;
        background-color: rgb(26, 148, 255);

    }
</style>