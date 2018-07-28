<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\LabaInvestor;

/**
 * LabaInvestorSearch represents the model behind the search form of `frontend\models\LabaInvestor`.
 */
class LabaInvestorSearch extends LabaInvestor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'lap_id', 'inv_id', 'laba'], 'integer'],
            [['bulan'], 'safe'],
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
        $query = LabaInvestor::find();

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
            'lap_id' => $this->lap_id,
            'inv_id' => $this->inv_id,
            'laba' => $this->laba,
        ]);

        $query->andFilterWhere(['like', 'bulan', $this->bulan]);

        return $dataProvider;
    }
}
