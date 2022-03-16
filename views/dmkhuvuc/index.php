<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DmkhuvucSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dmkhuvucs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dmkhuvuc-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Dmkhuvuc', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ma',
            'khuvuc',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Dmkhuvuc $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
