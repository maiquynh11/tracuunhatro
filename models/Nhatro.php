<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nhatro".
 *
 * @property int $id
 * @property string|null $ma
 * @property string|null $dientich
 * @property string|null $diachi
 * @property float|null $lat
 * @property float|null $lng
 * @property string|null $geom
 * @property string|null $tieude
 * @property string|null $mota
 * @property string|null $lienhe
 * @property string|null $gia
 * @property int|null $doituong_id
 * @property int|null $thanhvien_id
 * @property int|null $tienich_id
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
            [['diachi', 'geom', 'tieude', 'mota', 'lienhe'], 'string'],
            [['lat', 'lng'], 'number'],
            [['doituong_id', 'thanhvien_id', 'tienich_id'], 'default', 'value' => null],
            [['doituong_id', 'thanhvien_id', 'tienich_id'], 'integer'],
            [['ma', 'dientich', 'gia'], 'string', 'max' => 255],
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
            'dientich' => 'Dientich',
            'diachi' => 'Diachi',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'geom' => 'Geom',
            'tieude' => 'Tieude',
            'mota' => 'Mota',
            'lienhe' => 'Lienhe',
            'gia' => 'Gia',
            'doituong_id' => 'Doituong ID',
            'thanhvien_id' => 'Thanhvien ID',
            'tienich_id' => 'Tienich ID',
        ];
    }
    public function activeCheckbox() {
      
    }
}