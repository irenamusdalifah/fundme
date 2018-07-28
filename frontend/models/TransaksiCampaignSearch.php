<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TransaksiCampaign;

/**
 * TransaksiCampaignSearch represents the model behind the search form of `frontend\models\TransaksiCampaign`.
 */
class TransaksiCampaignSearch extends TransaksiCampaign
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tc_id', 'inv_id', 'cmpg_id'], 'integer'],
            [['tc_tanggal'], 'safe'],
            [['tc_dana'], 'number'],
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
        $query = TransaksiCampaign::find();

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
            'tc_id' => $this->tc_id,
            'inv_id' => $this->inv_id,
            'cmpg_id' => $this->cmpg_id,
            'tc_tanggal' => $this->tc_tanggal,
            'tc_dana' => $this->tc_dana,
        ]);

        return $dataProvider;
    }
}
