<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diemthuongmai".
 *
 * @property int $id
 * @property string|null $ten
 * @property string|null $diachi
 * @property string|null $phanloai
 * @property float|null $lng
 * @property float|null $lat
 * @property string|null $geom
 */
class Diemthuongmai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'diemthuongmai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lng', 'lat'], 'number'],
            [['geom'], 'string'],
            [['ten', 'diachi', 'phanloai'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten' => 'Ten',
            'diachi' => 'Diachi',
            'phanloai' => 'Phanloai',
            'lng' => 'Lng',
            'lat' => 'Lat',
            'geom' => 'Geom',
        ];
    }
}
