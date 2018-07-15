<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use yii\helpers\ArrayHelper;
use frontend\models\Kategori;
use yii\helpers\BaseUrl;

/* @var $this yii\web\View */
/* @var $model frontend\models\Campaign */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="campaign-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cmpg_judul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cmpg_deskripsi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cmpg_cerita')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cmpg_poster')->textInput() ?>

    <div class="col col-sm6" style="width: 50%; float: left;">
        <?= $form->field($model, 'cmpg_namaposter')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image_campaign/*'],
                'pluginOptions'=>[
                    
                    'allowedFileExtensions'=>['jpg', 'png', 'gif'],

                    'showUpload' => true,
                    'showRemove' => false,
                ],
            ]);
        ?>
    </div>
    <div style="width: 40%; float: left; height: 50%;">
        <img src="http://127.0.0.1/fundme/image_campaign/010.png" height="300px">
    </div>


    <?= $form->field($model, 'cmpg_targetdana')->input('number',['min'=>5000000, 'max'=>500000000, 'placeholder'=>'Masukkan Target Dana']); ?>

    <?= $form->field($model, 'cmpg_durasihari')->input('number',['min'=>30, 'max'=>90, 'placeholder'=>'Masukkan Target Durasi Pengumpulan Campaign']); ?>

    <?= $form->field($model, 'cmpg_totaldana')->textInput() ?>

    <?= $form->field($model, 'cmpg_laba_inv')->input('number',['min'=>1, 'max'=>98, 'placeholder'=>'Masukkan Laba Investor']); ?>

    <?= $form->field($model, 'cmpg_laba_pd')->input('number',['min'=>1, 'max'=>98, 'placeholder'=>'Masukkan Laba Anda']); ?>

    <?= $form->field($model, 'cmpg_kota')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cmpg_kategori_id')->textInput() ?>

    <?= $form->field($model, 'cmpg_kategori')->dropDownList(
        ArrayHelper::map(Kategori::find()->asArray()->all(),'jenis_kategori','jenis_kategori'), ['prompt'=>'Pilih Kategori'])?>

    <?= $form->field($model, 'cmpg_resiko')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
