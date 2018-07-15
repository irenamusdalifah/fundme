<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "bulan".
 *
 * @property int $idbulan
 * @property string $bulan
 */
class Bulan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bulan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idbulan', 'bulan'], 'required'],
            [['idbulan'], 'integer'],
            [['bulan'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idbulan' => 'Idbulan',
            'bulan' => 'Bulan',
        ];
    }
}
