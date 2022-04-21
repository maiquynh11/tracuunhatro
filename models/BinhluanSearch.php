<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Binhluan;

/**
 * BinhluanSearch represents the model behind the search form of `app\models\Binhluan`.
 */
class BinhluanSearch extends Binhluan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'noidung'], 'safe'],
            [['thanhvien_id', 'nhatro_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Binhluan::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'thanhvien_id' => $this->thanhvien_id,
            'nhatro_id' => $this->nhatro_id,
        ]);

        $query->andFilterWhere(['ilike', 'id', $this->id])
            ->andFilterWhere(['ilike', 'noidung', $this->noidung]);

        return $dataProvider;
    }
}
