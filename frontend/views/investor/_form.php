<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use frontend\models\Gender;
use yii\helpers\BaseUrl;

/* @var $this yii\web\View */
/* @var $model frontend\models\Investor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="investor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'inv_namadepan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inv_namabelakang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inv_nik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inv_gender')->dropDownList(
        ArrayHelper::map(Gender::find()->asArray()->all(),'gender','gender'), ['prompt'=>'Jenis Kelamin'])?>

    <?= $form->field($model, 'inv_foto')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
            'pluginOptions'=>[
            'allowedFileExtensions'=>['jpg', 'png', 'gif'],
            'showUpload' => false,
            'showRemove' => false,
        ],
        ]);?>

    <?= $form->field($model, 'inv_foto_kartu')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
            'pluginOptions'=>[
            'allowedFileExtensions'=>['jpg', 'png', 'gif'],
            'showUpload' => false,
            'showRemove' => false,
        ],
        ]);?>

    <?= $form->field($model, 'inv_tgllahir')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Pilih tanggal...'],
            'type' => DatePicker::TYPE_INPUT,
            'pluginOptions' => [
                'autoclose'=>true,
                'todayHighlight' => true,
                'format' => 'yyyy-mm-dd'
            ]
        ]);
    ?>

    <?= $form->field($model, 'inv_alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inv_kota')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inv_telepon')->textInput(['maxlength' => true]) ?>

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
