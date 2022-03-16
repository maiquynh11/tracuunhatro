<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dmgia */

$this->title = 'Create Dmgia';
$this->params['breadcrumbs'][] = ['label' => 'Dmgias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dmgia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
