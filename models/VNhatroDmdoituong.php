<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "v_nhatro_dmdoituong".
 *
 * @property int|null $nhatro_id
 * @property int|null $doituong_id
 * @property string|null $ma
 * @property string|null $ten
 * @property int|null $id
 */
class VNhatroDmdoituong extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'v_nhatro_dmdoituong';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nhatro_id', 'doituong_id', 'id'], 'default', 'value' => null],
            [['nhatro_id', 'doituong_id', 'id'], 'integer'],
            [['ma', 'ten'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nhatro_id' => 'Nhatro ID',
            'doituong_id' => 'Doituong ID',
            'ma' => 'Ma',
            'ten' => 'Ten',
            'id' => 'ID',
        ];
    }
}
