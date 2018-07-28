<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "penarikan_investasi_inv".
 *
 * @property int $pi_inv_id
 * @property int $pi_id
 * @property int $inv_id
 * @property string $tgl_awal_usaha
 * @property string $tgl_dimulai
 * @property string $tgl_kembali
 */
class PenarikanInvestasiInv extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penarikan_investasi_inv';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pi_id', 'inv_id', 'tgl_awal_usaha', 'tgl_dimulai', 'tgl_kembali'], 'required'],
            [['pi_id', 'inv_id'], 'integer'],
            [['tgl_awal_usaha', 'tgl_dimulai', 'tgl_kembali'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pi_inv_id' => 'Pi Inv ID',
            'pi_id' => 'Pi ID',
            'inv_id' => 'Inv ID',
            'tgl_awal_usaha' => 'Tgl Awal Usaha',
            'tgl_dimulai' => 'Tgl Dimulai',
            'tgl_kembali' => 'Tgl Kembali',
        ];
    }
}
