<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "image_carousel".
 *
 * @property int $id
 * @property string $image
 * @property string $keterangan
 */
class ImageCarousel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'image_carousel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image', 'keterangan'], 'required'],
            [['image', 'keterangan'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'keterangan' => 'Keterangan',
        ];
    }
}
