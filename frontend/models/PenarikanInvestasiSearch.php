<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\PenarikanInvestasi;

/**
 * PenarikanInvestasiSearch represents the model behind the search form of `frontend\models\PenarikanInvestasi`.
 */
class PenarikanInvestasiSearch extends PenarikanInvestasi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pi_id', 'cmpg_id'], 'integer'],
            [['opsi_satu_tahun', 'opsi_dua_tahun', 'opsi_tiga_tahun'], 'number'],
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
        $query = PenarikanInvestasi::find();

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
            'pi_id' => $this->pi_id,
            'cmpg_id' => $this->cmpg_id,
            'opsi_satu_tahun' => $this->opsi_satu_tahun,
            'opsi_dua_tahun' => $this->opsi_dua_tahun,
            'opsi_tiga_tahun' => $this->opsi_tiga_tahun,
        ]);

        return $dataProvider;
    }
}
