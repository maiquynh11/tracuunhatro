<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "v_listnhatro_tienich".
 *
 * @property int|null $tienich_id
 * @property int|null $nhatro_id
 * @property string|null $tieude
 * @property string|null $mota
 * @property string|null $dientich
 * @property string|null $diachi
 * @property string|null $gia
 */
class VListnhatroTienich extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'v_listnhatro_tienich';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tienich_id', 'nhatro_id'], 'default', 'value' => null],
            [['tienich_id', 'nhatro_id'], 'integer'],
            [['mota'], 'string'],
            [['tieude', 'dientich', 'diachi', 'gia'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tienich_id' => 'Tienich ID',
            'nhatro_id' => 'Nhatro ID',
            'tieude' => 'Tieude',
            'mota' => 'Mota',
            'dientich' => 'Dientich',
            'diachi' => 'Diachi',
            'gia' => 'Gia',
        ];
    }
}
