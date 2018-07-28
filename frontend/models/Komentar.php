<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "komentar".
 *
 * @property int $komentar_id
 * @property int $cmpg_id
 * @property int $inv_id
 * @property string $komentar
 */
class Komentar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'komentar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cmpg_id', 'inv_id', 'komentar'], 'required'],
            [['cmpg_id', 'inv_id'], 'integer'],
            [['tanggal'], 'safe'],
            [['komentar'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'komentar_id' => 'Komentar ID',
            'cmpg_id' => 'Cmpg ID',
            'inv_id' => 'Inv ID',
            'komentar' => 'Komentar',
            'tanggal' => 'Waktu',
        ];
    }
}
