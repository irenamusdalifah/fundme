<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Laporan;

/**
 * LaporanSearch represents the model behind the search form of `frontend\models\Laporan`.
 */
class LaporanSearch extends Laporan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lap_id', 'cmpg_id', 'lap_tahun'], 'integer'],
            [['lap_bulan', 'lap_file', 'lap_tgl'], 'safe'],
            [['lap_totallaba'], 'number'],
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
        $query = Laporan::find();

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
            'lap_id' => $this->lap_id,
            'cmpg_id' => $this->cmpg_id,
            'lap_tahun' => $this->lap_tahun,
            'lap_totallaba' => $this->lap_totallaba,
            'lap_tgl' => $this->lap_tgl,
        ]);

        $query->andFilterWhere(['like', 'lap_bulan', $this->lap_bulan])
            ->andFilterWhere(['like', 'lap_file', $this->lap_file]);

        return $dataProvider;
    }
}
