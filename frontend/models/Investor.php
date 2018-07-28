<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "investor".
 *
 * @property int $inv_id
 * @property string $inv_namadepan
 * @property string $inv_namabelakang
 * @property string $inv_nik
 * @property string $inv_gender
 * @property string $inv_foto
 * @property string $inv_foto_kartu
 * @property string $inv_tgllahir
 * @property string $inv_alamat
 * @property string $inv_kota
 * @property string $inv_telepon
 * @property int $user_id
 */
class Investor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'investor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['inv_namadepan', 'inv_namabelakang', 'inv_nik', 'inv_gender', 'inv_foto', 'inv_foto_kartu', 'inv_tgllahir', 'inv_alamat', 'inv_kota', 'inv_telepon', 'user_id'], 'required'],
            [['inv_tgllahir'], 'safe'],
            [['user_id'], 'integer'],
            [['inv_namadepan'], 'string', 'max' => 25],
            [['inv_namabelakang'], 'string', 'max' => 75],
            [['inv_nik', 'inv_telepon'], 'string', 'max' => 20],
            [['inv_gender'], 'string', 'max' => 10],
            [['inv_foto', 'inv_foto_kartu'], 'string', 'max' => 200],
            [['inv_alamat'], 'string', 'max' => 150],
            [['inv_kota'], 'string', 'max' => 50],
            [['inv_saldo'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'inv_id' => 'Inv ID',
            'inv_namadepan' => 'Inv Namadepan',
            'inv_namabelakang' => 'Inv Namabelakang',
            'inv_nik' => 'Inv Nik',
            'inv_gender' => 'Inv Gender',
            'inv_foto' => 'Inv Foto',
            'inv_foto_kartu' => 'Inv Foto Kartu',
            'inv_tgllahir' => 'Inv Tgllahir',
            'inv_alamat' => 'Inv Alamat',
            'inv_kota' => 'Inv Kota',
            'inv_telepon' => 'Inv Telepon',
            'user_id' => 'User ID',
            'inv_saldo' => 'Saldo User',
        ];
    }
}
