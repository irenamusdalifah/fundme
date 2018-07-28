<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "transaksi_campaign".
 *
 * @property int $tc_id
 * @property int $inv_id
 * @property int $cmpg_id
 * @property string $tc_tanggal
 * @property double $tc_dana
 */
class TransaksiCampaign extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaksi_campaign';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['inv_id', 'cmpg_id', 'tc_tanggal', 'tc_dana'], 'required'],
            [['inv_id', 'cmpg_id'], 'integer'],
            [['tc_tanggal'], 'safe'],
            [['tc_dana'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tc_id' => 'Tc ID',
            'inv_id' => 'Inv ID',
            'cmpg_id' => 'Cmpg ID',
            'tc_tanggal' => 'Tc Tanggal',
            'tc_dana' => 'Tc Dana',
        ];
    }
}
