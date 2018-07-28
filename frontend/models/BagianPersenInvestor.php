<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "bagian_persen_investor".
 *
 * @property int $id
 * @property int $inv_id
 * @property int $cmpg_id
 * @property int $total_investasi
 * @property int $persen
 */
class BagianPersenInvestor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bagian_persen_investor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['inv_id', 'cmpg_id', 'total_investasi', 'persen'], 'required'],
            [['inv_id', 'cmpg_id', 'total_investasi', 'persen'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'inv_id' => 'Inv ID',
            'cmpg_id' => 'Cmpg ID',
            'total_investasi' => 'Total Investasi',
            'persen' => 'Persen',
        ];
    }
}
