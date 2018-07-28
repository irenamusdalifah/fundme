<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Bulan;
use yii\helpers\ArrayHelper;
use kartik\widgets\FileInput;
use kartik\widgets\DatePicker;
use frontend\assets\PKAsset;
PKAsset::register($this);
/* @var $this yii\web\View */
/* @var $model frontend\models\Laporan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laporan-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'cmpg_id')->textInput() ?> -->

    <?= $form->field($model, 'lap_bulan')->dropDownList(
        ArrayHelper::map(Bulan::find()->asArray()->all(),'bulan','bulan'), ['prompt'=>'Pilih Bulan'])?>

    <?= $form->field($model, 'lap_tahun')->input('number', ['min'=>2018, 'placeholder'=>'Masukkan Tahun']) ?>

    <?= $form->field($model, 'lap_totallaba')->input('number', ['min'=>2018, 'placeholder'=>'Masukkan Laba Bersih Investor']) ?>

    <?= $form->field($model, 'lap_file')->widget(FileInput::classname(), [
        'options' => ['accept' => 'file_laporan/*'],
        'pluginOptions'=>[
            'allowedFileExtensions'=>['xls','pdf'],
            'showUpload' => false,
            'showRemove' => false,
        ],
    ]); 
    ?>

    <?= $form->field($model, 'lap_tgl')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Pilih Tanggal...'],
        'type' => DatePicker::TYPE_INPUT,
        'pluginOptions' => [
            'autoclose'=>true,
            'todayHighlight' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]); 
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
