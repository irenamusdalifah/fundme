<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Investor;

/**
 * InvestorSearch represents the model behind the search form of `frontend\models\Investor`.
 */
class InvestorSearch extends Investor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['inv_id', 'user_id'], 'integer'],
            [['inv_namadepan', 'inv_namabelakang', 'inv_nik', 'inv_gender', 'inv_foto', 'inv_foto_kartu', 'inv_tgllahir', 'inv_alamat', 'inv_kota', 'inv_telepon'], 'safe'],
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
        $query = Investor::find();

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
            'inv_id' => $this->inv_id,
            'inv_tgllahir' => $this->inv_tgllahir,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'inv_namadepan', $this->inv_namadepan])
            ->andFilterWhere(['like', 'inv_namabelakang', $this->inv_namabelakang])
            ->andFilterWhere(['like', 'inv_nik', $this->inv_nik])
            ->andFilterWhere(['like', 'inv_gender', $this->inv_gender])
            ->andFilterWhere(['like', 'inv_foto', $this->inv_foto])
            ->andFilterWhere(['like', 'inv_foto_kartu', $this->inv_foto_kartu])
            ->andFilterWhere(['like', 'inv_alamat', $this->inv_alamat])
            ->andFilterWhere(['like', 'inv_kota', $this->inv_kota])
            ->andFilterWhere(['like', 'inv_telepon', $this->inv_telepon]);

        return $dataProvider;
    }
}
