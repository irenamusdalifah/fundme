<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use yii\helpers\ArrayHelper;
use frontend\models\Kategori;
use backend\models\StatusCmpg;
use yii\helpers\BaseUrl;
use frontend\assets\PKAsset;
PKAsset::register($this);
/* @var $this yii\web\View */
/* @var $model frontend\models\Campaign */
/* @var $form yii\widgets\ActiveForm */
?>
<script type="text/javascript" src="http://localhost/fundme/frontend/assets/js/my.js"></script>
<div class="campaign-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cmpg_judul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cmpg_deskripsi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cmpg_cerita')->textarea(['rows' => 6]) ?>
    
    <?= $form->field($model, 'cmpg_namaposter')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image_campaign/*'],
        'pluginOptions'=>[
            'allowedFileExtensions'=>['jpg', 'png', 'gif'],
            'showUpload' => true,
            'showRemove' => false,
        ],
    ]);
    ?>
    

    <?= $form->field($model, 'cmpg_targetdana')->textInput(['min'=>5000000, 'max'=>500000000, 'placeholder'=>'Masukkan Target Dana', 'format' => ['decimal',0,',','.']]); ?>

    <?= $form->field($model, 'cmpg_durasihari')->input('number',['min'=>30, 'max'=>90, 'placeholder'=>'Masukkan Target Durasi Pengumpulan Campaign', 'format' => ['decimal',0,',','.']]); ?>


    <?= $form->field($model, 'cmpg_laba_inv')->input('number',['min'=>1, 'max'=>98, 'placeholder'=>'Masukkan Laba Investor']); ?>

    <?= $form->field($model, 'cmpg_laba_pd')->input('number',['min'=>1, 'max'=>98, 'placeholder'=>'Masukkan Laba Anda']); ?>

    <?= $form->field($model, 'cmpg_kota')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'cmpg_kategori')->dropDownList(
        ArrayHelper::map(Kategori::find()->asArray()->all(),'jenis_kategori','jenis_kategori'), ['prompt'=>'Pilih Kategori'])?>

    <?= $form->field($model, 'cmpg_resiko')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cmpg_status')->dropDownList(
        ArrayHelper::map(StatusCmpg::find()->asArray()->all(),'status','status'), ['prompt'=>'Status'])?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
