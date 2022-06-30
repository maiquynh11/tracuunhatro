
<div class="sidebar_post-header p-2">
    <div class="avatar-user">
        <img src="../img/aa.jpg" alt="">
    </div>
   <div class="post_acc">
       <span class="post_acc-name"> <?=Yii::$app->user->identity->getDisplayName() ?></span>
        <span class="post_acc-mail"><?=Yii::$app->user->identity->email; ?></span>
   </div>
</div>
<ul class="list-unstyled components">
    <li>
        <a href="<?=Yii::$app->homeUrl?>nhatro/index">
            <i class="fa-solid fa-paste pr-2 "></i>Quản lý bài đăng
        </a>    
    </li>
    <li class="">
        <a href="/nhatro/infor"> <i class="fa-solid fa-user-pen pr-2"></i>Thông tin tài khoản</a>
    </li>
    <li class="">
        <a class="" href="/home/logout" data-method="post"> <i class="fa-solid fa-right-from-bracket pr-2"></i>Đăng xuất</a>
    </li> 
</ul>

