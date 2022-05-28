<?php
namespace app\commands;
use Yii;
use yii\base\Controller;
use yii\controllers;

class RbacController extends Controller {
    public function actionInit() {

        $auth = Yii::$app->authManager;

        // $indexBinhluan = $auth->createPermission('index-binhluan');
        // $indexBinhluan->description = 'Xem danh sách bình luận';
        // $auth->add($indexBinhluan);

        // $createBinhluan = $auth->createPermission('create-binhluan');
        // $createBinhluan->description = 'Tạo mới bình luận';
        // $auth->add($createBinhluan);

        // $updateBinhluan = $auth->createPermission('update-binhluan');
        // $updateBinhluan->description = 'Cập nhật bình luận';
        // $auth->add($updateBinhluan);

        // $deleteBinhluan = $auth->createPermission('delete-binhluan');
        // $deleteBinhluan->description = 'Xóa bình luận';
        // $auth->add($deleteBinhluan);

        // $duyetBinhluan = $auth->createPermission('duyet-binhluan');
        // $duyetBinhluan->description = 'Duyệt bình luận';
        // $auth->add($duyetBinhluan);

        // $viewBinhluan = $auth->createPermission('view-binhluan');
        // $viewBinhluan->description = 'Xem chi tiết bình luận';
        // $auth->add($viewBinhluan);

        // $duyetBinhluan = $auth->createPermission('duyet-nhatro');
        // $duyetNhatro->description = "Duyệt bài đăng";
        // $auth->add($duyetNhatro);
        $nhatroManager = $auth->createRole('manager-nhatro');
        // $binhluanManager = $auth->createRole('manager-binhluan');
        // $auth->add($binhluanManager);     
        
        $admin = $auth->createRole('admin');


        $auth->addChild($admin, $nhatroManager);    

        // $auth->add($admin);

        
        // $auth->add($nhatroManager);
        // $auth->addChild($nhatroManager, $duyetNhatro);



        // $auth->addChild($binhluanManager, $indexBinhluan);
        // $auth->addChild($binhluanManager, $viewBinhluan);
        // $auth->addChild($binhluanManager, $deleteBinhluan);
        // $auth->addChild($binhluanManager, $updateBinhluan);
        // $auth->addChild($binhluanManager, $duyetBinhluan);


    }
}
?>