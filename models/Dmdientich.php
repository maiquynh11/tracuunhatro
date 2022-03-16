<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dmdientich".
 *
 * @property int $id
 * @property string|null $ma
 * @property string|null $dientich
 */
class Dmdientich extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dmdientich';
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
            [['ma', 'dientich'], 'string', 'max' => 255],
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
            'dientich' => 'Dientich',
        ];
    }
}
