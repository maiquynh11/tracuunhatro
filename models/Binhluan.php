<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "binhluan".
 *
 * @property int $id
 * @property string|null $noidung
 * @property int|null $user_id
 * @property int|null $nhatro_id
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $parent_id
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
            [['user_id', 'nhatro_id', 'parent_id'], 'default', 'value' => null],
            [['user_id', 'nhatro_id', 'parent_id'], 'integer'],
            [['created_by', 'updated_by'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['noidung'], 'string', 'max' => 255],
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
            'user_id' => 'User ID',
            'nhatro_id' => 'Nhatro ID',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'parent_id' => 'Parent ID',
        ];
    }
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    public function getParent()
    {
        return $this->hasOne(Binhluan::className(), ['id' => 'parent_id']);
    }
    // public function getBinhluans()
    // {
    //     return $this->hasMany(Binhluan::className(), ['parent_id' => 'id']);
    // }
    public function getNhatro()
    {
        return $this->hasOne(Nhatro::className(), ['id' => 'nhatro_id']);
    }
}
