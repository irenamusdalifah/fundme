<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\BagianPersenInvestor;

/**
 * BagianPersenInvestorSearch represents the model behind the search form of `frontend\models\BagianPersenInvestor`.
 */
class BagianPersenInvestorSearch extends BagianPersenInvestor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'inv_id', 'cmpg_id', 'total_investasi', 'persen'], 'integer'],
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
        $query = BagianPersenInvestor::find();

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
            'inv_id' => $this->inv_id,
            'cmpg_id' => $this->cmpg_id,
            'total_investasi' => $this->total_investasi,
            'persen' => $this->persen,
        ]);

        return $dataProvider;
    }
}
