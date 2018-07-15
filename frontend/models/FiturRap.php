<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "fitur_rap".
 *
 * @property int $rap_id
 * @property int $cmpg_id
 * @property string $rap_tgl
 * @property string $rap_file
 */
class FiturRap extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fitur_rap';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cmpg_id', 'rap_tgl', 'rap_file'], 'required'],
            [['cmpg_id'], 'integer'],
            [['rap_tgl'], 'safe'],
            [['rap_file'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'rap_id' => 'Rap ID',
            'cmpg_id' => 'Cmpg ID',
            'rap_tgl' => 'Rap Tgl',
            'rap_file' => 'Rap File',
        ];
    }
    
}
