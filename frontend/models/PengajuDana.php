<?php

namespace frontend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "pengaju_dana".
 *
 * @property int $pd_id
 * @property string $pd_namadepan
 * @property string $pd_namabelakang
 * @property string $pd_nik
 * @property string $pd_foto
 * @property string $pd_foto_kartu
 * @property string $pd_alamat
 * @property string $pd_kota
 * @property string $pd_tgllahir
 * @property string $pd_telepon
 * @property int $user_id
 *
 * @property User $user
 */
class PengajuDana extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pengaju_dana';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pd_namadepan', 'pd_namabelakang', 'pd_nik', 'pd_foto', 'pd_foto_kartu', 'pd_alamat', 'pd_kota', 'pd_tgllahir', 'pd_telepon', 'user_id'], 'required'],
            [['pd_id', 'user_id'], 'integer'],
            [['pd_tgllahir'], 'safe'],
            [['pd_namadepan'], 'string', 'max' => 25],
            [['pd_namabelakang'], 'string', 'max' => 75],
            [['pd_nik', 'pd_telepon'], 'string', 'max' => 20],
            [['pd_foto', 'pd_foto_kartu'], 'string', 'max' => 200],
            [['pd_alamat'], 'string', 'max' => 150],
            [['pd_kota'], 'string', 'max' => 50],
            [['pd_id'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pd_id' => 'Pd ID',
            'pd_namadepan' => 'Pd Namadepan',
            'pd_namabelakang' => 'Pd Namabelakang',
            'pd_nik' => 'Pd Nik',
            'pd_foto' => 'Pd Foto',
            'pd_foto_kartu' => 'Pd Foto Kartu',
            'pd_alamat' => 'Pd Alamat',
            'pd_kota' => 'Pd Kota',
            'pd_tgllahir' => 'Pd Tgllahir',
            'pd_telepon' => 'Pd Telepon',
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
