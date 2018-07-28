<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "penarikan_investasi".
 *
 * @property int $pi_id
 * @property int $cmpg_id
 * @property double $janji_laba
 * @property double $opsi_satu_tahun
 * @property double $opsi_dua_tahun
 */
class PenarikanInvestasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penarikan_investasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cmpg_id', 'janji_laba', 'opsi_satu_tahun', 'opsi_dua_tahun'], 'required'],
            [['cmpg_id'], 'integer'],
            [['janji_laba', 'opsi_satu_tahun', 'opsi_dua_tahun'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pi_id' => 'Pi ID',
            'cmpg_id' => 'Cmpg ID',
            'janji_laba' => 'Janji Laba',
            'opsi_satu_tahun' => 'Opsi Satu Tahun',
            'opsi_dua_tahun' => 'Opsi Dua Tahun',
        ];
    }
}
