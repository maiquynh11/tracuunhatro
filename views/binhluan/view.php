<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Binhluan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Binhluans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="binhluan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php $this->renderPartial('/comment/_form',array(
        'comment'=>$newComment,
        'update'=>false,
    )); ?>
    <?php if(isset($_POST['previewComment']) && !$comment->hasErrors()): ?>
        <h3>Preview</h3>
        <div class="comment">
        <div class="author"><?php echo $comment->authorLink; ?> says:</div>
        <div class="time"><?php echo date('F j, Y \a\t h:i a',$comment->createTime); ?></div>
        <div class="content"><?php echo $comment->contentDisplay; ?></div>
        </div><!-- post preview -->
    <?php endif; ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'noidung',
            'thanhvien_id',
            'nhatro_id',
        ],
    ]) ?>

</div>
