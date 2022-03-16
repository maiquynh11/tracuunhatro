<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Nhatro;

/**
 * NhatroSearch represents the model behind the search form of `app\models\Nhatro`.
 */
class NhatroSearch extends Nhatro
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'doituong_id', 'thanhvien_id', 'tienich_id'], 'integer'],
            [['ma', 'dientich', 'diachi', 'geom', 'tieude', 'mota', 'lienhe', 'gia'], 'safe'],
            [['lat', 'lng'], 'number'],
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
        $query = Nhatro::find();

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
            'lat' => $this->lat,
            'lng' => $this->lng,
            'doituong_id' => $this->doituong_id,
            'thanhvien_id' => $this->thanhvien_id,
            'tienich_id' => $this->tienich_id,
        ]);

        $query->andFilterWhere(['ilike', 'ma', $this->ma])
            ->andFilterWhere(['ilike', 'dientich', $this->dientich])
            ->andFilterWhere(['ilike', 'diachi', $this->diachi])
            ->andFilterWhere(['ilike', 'geom', $this->geom])
            ->andFilterWhere(['ilike', 'tieude', $this->tieude])
            ->andFilterWhere(['ilike', 'mota', $this->mota])
            ->andFilterWhere(['ilike', 'lienhe', $this->lienhe])
            ->andFilterWhere(['ilike', 'gia', $this->gia]);

        return $dataProvider;
    }
}
