<div class="container ">
    <div class="mt-5 row">
        <div class="col-6 form-login">
            <h4 class="login-title">ĐĂNG NHẬP</h4>
            <div class="content-login">
                <form method="post" class="">
                    <div class="form-group">
                        <label for="login-username" class="label-material">User Name</label>
                        <input id="login-username" type="text" name="loginUsername" required
                            data-msg="Please enter your username" class="input-material">
                    </div>
                    <div class="form-group">
                        <label for="login-password" class="label-material">Password</label>
                        <input id="login-password" type="password" name="loginPassword" required
                            data-msg="Please enter your password" class="input-material">
                    </div>
                    <div class="btn-login">
                        <button class="btn btn-primary">Login</button>
                        <a href="#" class="forgot-pass">Forgot Password?</a>
                    </div>
                </form>
                <br><small>Bạn chưa có tài khoản
                    ?</small><a href="<?=Yii::$app->homeUrl?>home/logout" class="signup">Đăng ký</a>
            </div>
        </div>
        <div class="col-6 form-signup">
            <h4 class="signup-title">ĐĂNG KÝ</h4>
            <div class="content-signup">
                <form method="post" class="">
                    <div class="form-group">
                        <label for="register-username" class="label-material">User Name</label>

                        <input id="register-username" type="text" name="registerUsername" required
                            data-msg="Please enter your username" class="input-material">
                    </div>
                    <div class="form-group">
                        <label for="register-email" class="label-material">Email </label>

                        <input id="register-email" type="email" name="registerEmail" required
                            data-msg="Please enter a valid email address" class="input-material">
                    </div>
                    <div class="form-group">
                        <label for="register-password" class="label-material">Password</label>

                        <input id="register-password" type="password" name="registerPassword" required
                            data-msg="Please enter your password" class="input-material">
                    </div>
                    <div class="btn-signup">
                        <button id="register" type="submit" name="registerSubmit" class="btn btn-primary">Đăng
                            ký</button>
                    </div>
                </form>
                <small>Bạn đã có tài khoản</small>
                <a href="" class="signup">Đăng nhập</a>
            </div>
        </div>
    </div>
</div>