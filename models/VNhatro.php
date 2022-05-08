<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "v_nhatro".
 *
 * @property string|null $ma
 * @property string|null $tieude
 * @property int|null $id
 * @property string|null $gia
 * @property string|null $dientich
 * @property string|null $diachi
 * @property string|null $lienhe
 * @property string|null $mota
 * @property string|null $tienich_id
 * @property string|null $dmkhuvuc_id
 * @property string|null $dmgia_id
 * @property string|null $thanhvien_id
 * @property float|null $lat
 * @property float|null $lng
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $status
 * @property string|null $dmdoituong_ten
 */
class VNhatro extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'v_nhatro';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'default', 'value' => null],
            [['id', 'status'], 'integer'],
            [['mota'], 'string'],
            [['lat', 'lng'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['ma', 'tieude', 'gia', 'dientich', 'diachi', 'lienhe', 'tienich_id', 'dmkhuvuc_id', 'dmgia_id', 'thanhvien_id', 'dmdoituong_ten'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ma' => 'Ma',
            'tieude' => 'Tieude',
            'id' => 'ID',
            'gia' => 'Gia',
            'dientich' => 'Dientich',
            'diachi' => 'Diachi',
            'lienhe' => 'Lienhe',
            'mota' => 'Mota',
            'tienich_id' => 'Tienich ID',
            'dmkhuvuc_id' => 'Dmkhuvuc ID',
            'dmgia_id' => 'Dmgia ID',
            'thanhvien_id' => 'Thanhvien ID',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'dmdoituong_ten' => 'Dmdoituong Ten',
        ];
    }
}
