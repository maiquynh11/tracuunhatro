<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dmdoituong".
 *
 * @property int $id
 * @property string|null $ma
 * @property string|null $ten
 */
class Dmdoituong extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dmdoituong';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ma', 'ten'], 'string', 'max' => 255],
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
            'ten' => 'Ten',
        ];
    }
}
