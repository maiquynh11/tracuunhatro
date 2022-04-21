<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'ĐĂNG NHẬP';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login container p-5">
    <h5 class="text-center font-weight-bold"><?= Html::encode($this->title) ?></h5>
    <div class="row mt-4 justify-content-center">
        <div class="col-lg-5 login-box">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <div class="form-groups">
                <span>Quên mật khẩu ?</span>
                <?= Html::a('reset it', ['site/request-password-reset']) ?>.    
                
            </div>
            <div class="form-groups">
                <span> Bạn chưa có tài khoản ?</span>
                <?= Html::a('Đăng ký ngay', ['home/signup']) ?>
            </div>
            <div class="form-group mt-3">
                <?= Html::submitButton('Đăng nhập', ['class' => 'btn btn-primary login-button', 'name' => 'login-button']) ?>
            </div>
            <div class="">hoặc tiếp tục với</div>
            <div class="form-group mt-3">
                <?= Html::submitButton('Google', ['class' => 'btn btn-danger login-button', 'name' => 'login-button']) ?>
            </div>
            <div class="form-group mt-3">
                <?= Html::submitButton('Facebook', ['class' => 'btn btn-primary login-button', 'name' => 'login-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>