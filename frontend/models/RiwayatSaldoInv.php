<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "riwayat_saldo_inv".
 *
 * @property int $id
 * @property int $inv_id
 * @property int $saldo
 * @property string $tanggal
 */
class RiwayatSaldoInv extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'riwayat_saldo_inv';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['inv_id', 'saldo', 'tanggal'], 'required'],
            [['inv_id', 'saldo'], 'integer'],
            [['tanggal'], 'safe'],
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
            'saldo' => 'Saldo',
            'tanggal' => 'Tanggal',
        ];
    }
}
