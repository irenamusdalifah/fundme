<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use kartik\widgets\DatePicker;


/* @var $this yii\web\View */
/* @var $model frontend\models\fiturRap */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fitur-rap-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'cmpg_id')->textInput() ?> -->

    <?= $form->field($model, 'rap_tgl')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Pilih tanggal...'],
            'type' => DatePicker::TYPE_INPUT,
            'pluginOptions' => [
                'autoclose'=>true,
                'todayHighlight' => true,
                'format' => 'yyyy-mm-dd'
            ]
        ]); 
    ?>

    <?= $form->field($model, 'rap_file')->widget(FileInput::classname(), [
                'options' => ['accept' => 'file_rap/*'],
                'pluginOptions'=>[
                    'allowedFileExtensions'=>['pdf'],
                    'showUpload' => false,
                    'showRemove' => false,
                ],
            ]); 
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
