<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dmtienich".
 *
 * @property int $id
 * @property string|null $ma
 * @property string|null $tienich
 */
class Dmtienich extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dmtienich';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ma', 'tienich'], 'string', 'max' => 255],
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
            'tienich' => 'Tienich',
        ];
    }
}
