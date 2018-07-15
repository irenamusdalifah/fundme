<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "cmpg_kategori".
 *
 * @property int $id
 * @property string $jenis_kategori
 *
 * @property Campaign[] $campaigns
 */
class Kategori extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cmpg_kategori';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jenis_kategori'], 'required'],
            [['jenis_kategori'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jenis_kategori' => 'Jenis Kategori',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCampaigns()
    {
        return $this->hasMany(Campaign::className(), ['kategori_id' => 'id']);
    }
}
