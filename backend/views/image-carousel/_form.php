<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model frontend\models\ImageCarousel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="image-carousel-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'image')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image_carousel/*'],
        'pluginOptions'=>[
            'allowedFileExtensions'=>['jpg', 'png', 'gif'],
            'showUpload' => true,
            'showRemove' => false,
        ],
    ]);
    ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
