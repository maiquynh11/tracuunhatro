<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nhatro_dmdoituong".
 *
 * @property int|null $nhatro_id
 * @property int|null $doituong_id
 * @property int $id
 */
class NhatroDmdoituong extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nhatro_dmdoituong';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nhatro_id', 'doituong_id'], 'default', 'value' => null],
            [['nhatro_id', 'doituong_id'], 'integer'],
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
            'id' => 'ID',
        ];
    }
   
}
