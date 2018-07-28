<?php

namespace frontend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "campaign".
 *
 * @property int $cmpg_id
 * @property string $cmpg_judul
 * @property string $cmpg_deskripsi
 * @property string $cmpg_cerita
 * @property resource $cmpg_poster
 * @property string $cmpg_namaposter
 * @property double $cmpg_targetdana
 * @property int $cmpg_durasihari
 * @property double $cmpg_totaldana
 * @property int $cmpg_laba_inv
 * @property int $cmpg_laba_pd
 * @property string $cmpg_kota
 * @property int $cmpg_kategori_id
 * @property string $cmpg_kategori
 * @property string $cmpg_resiko
 * @property int $user_id
 *
 * @property User $user
 */
class Campaign extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'campaign';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cmpg_judul', 'cmpg_deskripsi', 'cmpg_cerita', 'cmpg_namaposter', 'cmpg_targetdana', 'cmpg_durasihari', 'cmpg_laba_inv', 'cmpg_laba_pd', 'cmpg_kota', 'cmpg_kategori', 'cmpg_resiko', 'user_id'], 'required'],
            [['cmpg_cerita', 'cmpg_poster', 'cmpg_resiko'], 'string'],
            [['cmpg_targetdana', 'cmpg_totaldana'], 'number'],
            [['cmpg_durasihari', 'cmpg_laba_inv', 'cmpg_laba_pd', 'cmpg_kategori_id', 'user_id'], 'integer'],
            [['cmpg_judul', 'cmpg_namaposter', 'cmpg_kota'], 'string', 'max' => 100],
            [['cmpg_deskripsi'], 'string', 'max' => 255],
            [['cmpg_kategori'], 'string', 'max' => 50],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cmpg_id' => 'Cmpg ID',
            'cmpg_judul' => 'Cmpg Judul',
            'cmpg_deskripsi' => 'Cmpg Deskripsi',
            'cmpg_cerita' => 'Cmpg Cerita',
            'cmpg_poster' => 'Cmpg Poster',
            'cmpg_namaposter' => 'Cmpg Namaposter',
            'cmpg_targetdana' => 'Cmpg Targetdana',
            'cmpg_durasihari' => 'Cmpg Durasihari',
            'cmpg_totaldana' => 'Cmpg Totaldana',
            'cmpg_laba_inv' => 'Cmpg Laba Inv',
            'cmpg_laba_pd' => 'Cmpg Laba Pd',
            'cmpg_kota' => 'Cmpg Kota',
            'cmpg_kategori_id' => 'Cmpg Kategori ID',
            'cmpg_kategori' => 'Cmpg Kategori',
            'cmpg_resiko' => 'Cmpg Resiko',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
