<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "laba_investor".
 *
 * @property int $id
 * @property int $lap_id
 * @property int $inv_id
 * @property string $bulan
 * @property int $laba
 */
class LabaInvestor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'laba_investor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lap_id', 'inv_id', 'bulan', 'laba'], 'required'],
            [['lap_id', 'inv_id', 'laba'], 'integer'],
            [['bulan'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lap_id' => 'Lap ID',
            'inv_id' => 'Inv ID',
            'bulan' => 'Bulan',
            'laba' => 'Laba',
        ];
    }
}
