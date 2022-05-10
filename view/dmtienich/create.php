<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dmtienich */

$this->title = 'Create Dmtienich';
$this->params['breadcrumbs'][] = ['label' => 'Dmtieniches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dmtienich-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
