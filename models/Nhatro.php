<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nhatro".
 *
 * @property string $id
 * @property string|null $ma
 * @property string|null $tieude
 * @property string|null $gia
 * @property string|null $dientich
 * @property string|null $diachi
 * @property string|null $lienhe
 * @property string|null $doituong_id
 * @property string|null $thanhvien_id
 * @property string|null $dmgia_id
 * @property string|null $dmkhuvuc_id
 * @property string|null $tienich_id
 * @property string|null $mota
 * @property float|null $lat
 * @property float|null $geom
 * @property float|null $lng
 * @property string|null $created_time
 * @property string|null $update_time
 * @property int|null $status
 * @property User $createdBy
 * @property User $updatedBy
 */

 

class Nhatro extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nhatro';
    }
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'attributes' => [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    \yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mota'], 'string'],
            [['lat', 'lng'], 'number'],
            [['created_at', 'update_at'], 'safe'],
            [['status'], 'default', 'value' => null],
            [['status'], 'integer'],
            [['ma', 'tieude', 'gia', 'dientich', 'diachi', 'lienhe', 'user_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ma' => 'Ma',
            'tieude' => 'Tiêu đề',
            'gia' => 'Giá',
            'dientich' => 'Diện tích',
            'diachi' => 'Địa chỉ',
            'lienhe' => 'Liên hệ',
            'thanhvien_id' => 'Thành viên',   
            'dmkhuvuc_id' => 'Khu vực',
            'mota' => 'Mô tả',
            'lat' => 'Lat',
            'geom' => 'Geom',
            'lng' => 'Lng',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'status' => '',
        ];
    }

    // public function getCreatedBy()
    // {
    //     return $this->hasOne(Yii::$app->user->identityClass, ['id' => 'created_by']);
    // }
    // public function getUpdatedBy()
    // {
    //     return $this->hasOne(Yii::$app->user->identityClass, ['id' => 'updated_by']);
    // }
    // public function getDmkhuvuc() {
    //     return $this->hasOne(Dmkhuvuc::class, ['id', 'dmkhuvuc_id']);
    // }
    // public function getBinhluan() {
    //     return $this->hasMany(Binhluan::class, ['binhluan_id', 'id']);
    // }
    // public function getUser() {
    //     return $this->hasOne(User::class, ['id', 'user_id']);
    // }
    // public function beforeSave($insert)
    // {
    //     if (parent::beforeSave($insert)) {
    //         if($insert)
    //             $this->created_at = date('Y-m-d H:i:s');
    //             $this->updated_at = date('Y-m-d H:i:s');
    //         return true;
    //     } 
    //     else {
    //     return false;
    //     }
    // }
}
