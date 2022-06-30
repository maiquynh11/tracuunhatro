<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Diemthuongmai;

/**
 * DiemthuongmaiSearch represents the model behind the search form of `app\models\Diemthuongmai`.
 */
class DiemthuongmaiSearch extends Diemthuongmai
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['ten', 'diachi', 'phanloai', 'geom'], 'safe'],
            [['lng', 'lat'], 'number'],
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
        $query = Diemthuongmai::find();

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
            'id' => $this->id,
            'lng' => $this->lng,
            'lat' => $this->lat,
        ]);

        $query->andFilterWhere(['ilike', 'ten', $this->ten])
            ->andFilterWhere(['ilike', 'diachi', $this->diachi])
            ->andFilterWhere(['ilike', 'phanloai', $this->phanloai])
            ->andFilterWhere(['ilike', 'geom', $this->geom]);

        return $dataProvider;
    }
}
