<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'ĐĂNG KÝ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup container p-5">
    <div class="row justify-content-center ">
        <div class="col-lg-5 signup-box">
            <h5><?= Html::encode($this->title) ?></h5>
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'firstname')->textInput(['autofocus' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'lastname')->textInput(['autofocus' => true]) ?>
                </div>
            </div>
            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <div class="form-group pt-2">
                <?= Html::submitButton('Đăng ký ', ['class' => 'btn btn-primary signup-button', 'name' => 'signup-button']) ?>
            </div>
            <div class="form-groups pt-2">
                <span>Bạn đã có tài khoản ?</span>
                <?= Html::a('Đăng nhập', ['home/login']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>