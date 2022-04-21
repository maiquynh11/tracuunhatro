<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BinhluanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Binhluans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="binhluan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Binhluan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'noidung',
            'thanhvien_id',
            'nhatro_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Binhluan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
