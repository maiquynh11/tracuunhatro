<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dmgia".
 *
 * @property int $id
 * @property string|null $ma
 * @property string|null $mucgia
 */
class Dmgia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dmgia';
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
            [['ma', 'mucgia'], 'string', 'max' => 255],
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
            'mucgia' => 'Mucgia',
        ];
    }
}