<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use kartik\widgets\DatePicker;


/* @var $this yii\web\View */
/* @var $model frontend\models\PengajuDana */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengaju-dana-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pd_id')->textInput() ?>

    <?= $form->field($model, 'pd_namadepan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pd_namabelakang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pd_nik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pd_foto')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
            'pluginOptions'=>[
            'allowedFileExtensions'=>['jpg', 'png', 'gif'],
            'showUpload' => false,
            'showRemove' => false,
        ],
        ]);?>

    <?= $form->field($model, 'pd_foto_kartu')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
            'pluginOptions'=>[
            'allowedFileExtensions'=>['jpg', 'png', 'gif'],
            'showUpload' => false,
            'showRemove' => false,
        ],
        ]);?>


    <?= $form->field($model, 'pd_alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pd_kota')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pd_tgllahir')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Pilih tanggal...'],
            'type' => DatePicker::TYPE_INPUT,
            'pluginOptions' => [
                'autoclose'=>true,
                'todayHighlight' => true,
                'format' => 'yyyy-mm-dd'
            ]
        ]);
    ?>

    <?= $form->field($model, 'pd_telepon')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
