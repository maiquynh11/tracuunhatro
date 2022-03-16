<?php

namespace app\models;

use Yii;
use yii\base\Model;

class FilterBoxForm extends Model
{
    public $tienich_id;
    public $dmkhuvuc_id;
    public $dmdientich_id;
    public $dmgia_id;

    public function rules()
    {
        return [
            ['tienich_id', 'string'],
            [['dmdientich_id', 'dmgia_id', 'dmkhuvuc_id'], 'number'],
        ];
    }
}