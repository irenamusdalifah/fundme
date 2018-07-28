<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\PenarikanInvestasiInv;

/**
 * PenarikanInvestasiInvSearch represents the model behind the search form of `frontend\models\PenarikanInvestasiInv`.
 */
class PenarikanInvestasiInvSearch extends PenarikanInvestasiInv
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pi_inv_id', 'pi_id', 'inv_id'], 'integer'],
            [['tgl_awal_usaha', 'tgl_dimulai', 'tgl_kembali'], 'safe'],
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
        $query = PenarikanInvestasiInv::find();

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
            'pi_inv_id' => $this->pi_inv_id,
            'pi_id' => $this->pi_id,
            'inv_id' => $this->inv_id,
            'tgl_awal_usaha' => $this->tgl_awal_usaha,
            'tgl_dimulai' => $this->tgl_dimulai,
            'tgl_kembali' => $this->tgl_kembali,
        ]);

        return $dataProvider;
    }
}
