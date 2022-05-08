<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TienichSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tieniches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tienich-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tienich', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ma',
            'ten',
            ['class' => 'yii\grid\ActionColumn',
                 'buttons' => [
                    'view' => function($url, $model) {
                         return Html::a('', $url, ['class' => 'fa-solid fa-eye']);
                    },
                    'update' => function($url, $model) {
                        return Html::a('', $url, ['class' => 'fa-solid fa-edit']);
                    },
                    'delete' => function($url, $model) {
                        return Html::a('', $url, [
                            'class' => 'fa-solid fa-trash', 
                            'data-confirm' => 'Bạn có chắc chắn muốn xóa "' .$model->ma.'" không ? ',
                            'data-method' => 'post',
                        ]);
                    }   
                ]]
        ],
    ]); ?>


</div>
