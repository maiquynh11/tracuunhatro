<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tienich".
 *
 * @property int $id
 * @property string|null $ma
 * @property string|null $ten
 */
class Tienich extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tienich';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'default', 'value' => null],
            [['id'], 'integer'],
            [['ma', 'ten'], 'string', 'max' => 255],
            [['id'], 'unique'],
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