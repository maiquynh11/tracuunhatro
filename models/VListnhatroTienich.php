<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "v_listnhatro_tienich".
 *
 * @property int|null $nhatro_id
 * @property int|null $tienich_id
 * @property string|null $tieude
 * @property int|null $id
 * @property string|null $mota
 * @property string|null $gia
 * @property string|null $diachi
 * @property string|null $dientich
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
            [['nhatro_id', 'tienich_id', 'id'], 'default', 'value' => null],
            [['nhatro_id', 'tienich_id', 'id'], 'integer'],
            [['mota'], 'string'],
            [['tieude', 'gia', 'diachi', 'dientich'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nhatro_id' => 'Nhatro ID',
            'tienich_id' => 'Tienich ID',
            'tieude' => 'Tieude',
            'id' => 'ID',
            'mota' => 'Mota',
            'gia' => 'Gia',
            'diachi' => 'Diachi',
            'dientich' => 'Dientich',
        ];
    }
}
