<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "binhluan".
 *
 * @property string $id
 * @property string|null $noidung
 * @property int|null $thanhvien_id
 * @property int|null $nhatro_id
 */
class Binhluan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'binhluan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['thanhvien_id', 'nhatro_id'], 'default', 'value' => null],
            [['thanhvien_id', 'nhatro_id'], 'integer'],
            [['id', 'noidung'], 'string', 'max' => 255],
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
            'noidung' => 'Noidung',
            'thanhvien_id' => 'Thanhvien ID',
            'nhatro_id' => 'Nhatro ID',
        ];
    }
  
}
