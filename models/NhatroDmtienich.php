<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nhatro_dmtienich".
 *
 * @property int $id
 * @property int|null $tienich_id
 * @property int|null $nhatro_id
 */
class NhatroDmtienich extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nhatro_dmtienich';
    }
    public $listDmTienichID = [];
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tienich_id', 'nhatro_id'], 'default', 'value' => null],
            [['tienich_id', 'nhatro_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tienich_id' => 'Tienich ID',
            'nhatro_id' => 'Nhatro ID',
        ];
    }
    
   
}
