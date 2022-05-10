<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "v_nhatro_dmtienich".
 *
 * @property int|null $id
 * @property int|null $nhatro_id
 * @property int|null $tienich_id
 * @property string|null $tienich
 */
class VNhatroDmtienich extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'v_nhatro_dmtienich';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nhatro_id', 'tienich_id'], 'default', 'value' => null],
            [['id', 'nhatro_id', 'tienich_id'], 'integer'],
            [['tienich'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nhatro_id' => 'Nhatro ID',
            'tienich_id' => 'Tienich ID',
            'tienich' => 'Tienich',
        ];
    }
}
