<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\PengajuDana;

/**
 * PengajuDanaSearch represents the model behind the search form of `frontend\models\PengajuDana`.
 */
class PengajuDanaSearch extends PengajuDana
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pd_id', 'user_id'], 'integer'],
            [['pd_namadepan', 'pd_namabelakang', 'pd_nik', 'pd_foto', 'pd_foto_kartu', 'pd_alamat', 'pd_kota', 'pd_tgllahir', 'pd_telepon'], 'safe'],
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
        $query = PengajuDana::find();

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
            'pd_id' => $this->pd_id,
            'pd_tgllahir' => $this->pd_tgllahir,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'pd_namadepan', $this->pd_namadepan])
            ->andFilterWhere(['like', 'pd_namabelakang', $this->pd_namabelakang])
            ->andFilterWhere(['like', 'pd_nik', $this->pd_nik])
            ->andFilterWhere(['like', 'pd_foto', $this->pd_foto])
            ->andFilterWhere(['like', 'pd_foto_kartu', $this->pd_foto_kartu])
            ->andFilterWhere(['like', 'pd_alamat', $this->pd_alamat])
            ->andFilterWhere(['like', 'pd_kota', $this->pd_kota])
            ->andFilterWhere(['like', 'pd_telepon', $this->pd_telepon]);

        return $dataProvider;
    }
}
