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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mota'], 'string'],
            [['lat', 'geom', 'lng'], 'number'],
            [['created_at', 'update_at'], 'safe'],
            [['status'], 'default', 'value' => null],
            [['status'], 'integer'],
            [['ma', 'tieude', 'gia', 'dientich', 'diachi', 'lienhe', 'user_id','dmkhuvuc_id'], 'string', 'max' => 255],
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
            'created_at' => 'Ngày tạo',
            'update_at' => 'Update Time',
            'status' => 'Trạng thái',
        ];
    }
    public function getDmkhuvuc() {
        return $this->hasOne(Dmkhuvuc::class, ['id', 'dmkhuvuc_id']);
    }
}
