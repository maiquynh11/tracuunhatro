<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "v_nhatro_dmtienich".
 *
 * @property int|null $id
 * @property int|null $nhatro_id
 * @property int|null $tienich_id
 * @property string|null $tienich
 */
class VNhatroDmtienich extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $listDmTienichID = [];
    public static function tableName()
    {
        return 'v_nhatro_dmtienich';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nhatro_id', 'tienich_id'], 'default', 'value' => null],
            [['id', 'nhatro_id', 'tienich_id'], 'integer'],
            [['tienich'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nhatro_id' => 'Nhatro ID',
            'tienich_id' => 'Tienich ID',
            'tienich' => 'Tienich',
        ];
    }
    public function loadTienich()
    {
        $this->listDmTienichID = [];
        if (!empty($this->id)) {
            $rows = VNhatroDmtienich::find()
                ->select(['tienich_id'])
                ->where(['nhatro_id' => $this->id])
                ->asArray()
                ->all();
            foreach($rows as $row) {
               $this->listDmTienichID[] = $row['list_dmtienich_id'];
            }
        }
    }

    /**
     * save the post's categories (*3)
     */
    public function saveTienich()
    {
        /* clear the categories of the post before saving */
        VNhatroDmtienich::deleteAll(['nhatro_id' => $this->id]);
        if (is_array($this->listDmTienichID)) {
            foreach($this->listDmTienichID as $dmTienichId) {
                $nhatroDmTienich = new VNhatroDmtienich();
                $nhatroDmTienich->nhatro_id = $this->id;
                $nhatroDmTienich->dmTienichId = $dmTienichId;
                $nhatroDmTienich->save();
            }
        }
        /* Be careful, $this->listDmTienichID can be empty */
    }
}
