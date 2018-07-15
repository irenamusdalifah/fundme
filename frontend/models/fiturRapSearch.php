<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\fiturRap;

/**
 * fiturRapSearch represents the model behind the search form of `frontend\models\fiturRap`.
 */
class fiturRapSearch extends fiturRap
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rap_id', 'cmpg_id'], 'integer'],
            [['rap_tgl', 'rap_file'], 'safe'],
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
        $query = fiturRap::find();

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
            'rap_id' => $this->rap_id,
            'cmpg_id' => $this->cmpg_id,
            'rap_tgl' => $this->rap_tgl,
        ]);

        $query->andFilterWhere(['like', 'rap_file', $this->rap_file]);

        return $dataProvider;
    }
}
