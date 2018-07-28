<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Campaign;

/**
 * CampaignSearch represents the model behind the search form of `backend\models\Campaign`.
 */
class CampaignSearch extends Campaign
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cmpg_id', 'cmpg_durasihari', 'cmpg_laba_inv', 'cmpg_laba_pd', 'cmpg_kategori_id', 'user_id', 'cmpg_status'], 'integer'],
            [['cmpg_judul', 'cmpg_deskripsi', 'cmpg_cerita', 'cmpg_poster', 'cmpg_namaposter', 'cmpg_kota', 'cmpg_kategori', 'cmpg_resiko'], 'safe'],
            [['cmpg_targetdana', 'cmpg_totaldana'], 'number'],
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
        $query = Campaign::find();

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
            'cmpg_id' => $this->cmpg_id,
            'cmpg_targetdana' => $this->cmpg_targetdana,
            'cmpg_durasihari' => $this->cmpg_durasihari,
            'cmpg_totaldana' => $this->cmpg_totaldana,
            'cmpg_laba_inv' => $this->cmpg_laba_inv,
            'cmpg_laba_pd' => $this->cmpg_laba_pd,
            'cmpg_kategori_id' => $this->cmpg_kategori_id,
            'user_id' => $this->user_id,
            'cmpg_status' => $this->cmpg_status,
        ]);

        $query->andFilterWhere(['like', 'cmpg_judul', $this->cmpg_judul])
            ->andFilterWhere(['like', 'cmpg_deskripsi', $this->cmpg_deskripsi])
            ->andFilterWhere(['like', 'cmpg_cerita', $this->cmpg_cerita])
            ->andFilterWhere(['like', 'cmpg_poster', $this->cmpg_poster])
            ->andFilterWhere(['like', 'cmpg_namaposter', $this->cmpg_namaposter])
            ->andFilterWhere(['like', 'cmpg_kota', $this->cmpg_kota])
            ->andFilterWhere(['like', 'cmpg_kategori', $this->cmpg_kategori])
            ->andFilterWhere(['like', 'cmpg_resiko', $this->cmpg_resiko]);

        return $dataProvider;
    }
}
