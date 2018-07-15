<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "laporan".
 *
 * @property int $lap_id
 * @property int $cmpg_id
 * @property string $lap_bulan
 * @property int $lap_tahun
 * @property double $lap_totallaba
 * @property string $lap_file
 * @property string $lap_tgl
 */
class Laporan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'laporan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cmpg_id', 'lap_bulan', 'lap_tahun', 'lap_totallaba', 'lap_file', 'lap_tgl'], 'required'],
            [['cmpg_id', 'lap_tahun'], 'integer'],
            [['lap_totallaba'], 'number'],
            [['lap_tgl'], 'safe'],
            [['lap_bulan'], 'string', 'max' => 15],
            [['lap_file'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'lap_id' => 'Lap ID',
            'cmpg_id' => 'Cmpg ID',
            'lap_bulan' => 'Lap Bulan',
            'lap_tahun' => 'Lap Tahun',
            'lap_totallaba' => 'Lap Totallaba',
            'lap_file' => 'Lap File',
            'lap_tgl' => 'Lap Tgl',
        ];
    }
}
