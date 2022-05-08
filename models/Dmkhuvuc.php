<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dmkhuvuc".
 *
 * @property int $id
 * @property string|null $ma
 * @property string|null $khuvuc
 */
class Dmkhuvuc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dmkhuvuc';
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
            [['ma', 'khuvuc'], 'string', 'max' => 255],
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
            'khuvuc' => 'Khuvuc',
        ];
    }
    public function getNhatro() {
        return $this->hasMany(Nhatro::class, ['nhatro_id', 'id' ]);
    }
}
