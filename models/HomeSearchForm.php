<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * HomeSearchForm is the model behind the login form.
 *
 *
 */
class HomeSearchForm extends Model
{
    public $dmkhuvuc_id;
    public $dmdientich_id;
    public $dmgia_id;
    public $query;
    public $tienich_id;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // rememberMe must be a boolean value
            [['query'], 'string'],
            [['dmdientich_id', 'dmgia_id', 'dmkhuvuc_id', 'tienich_id'], 'number'],
        ];
    }
}