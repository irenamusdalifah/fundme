<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DateTimePicker;
use frontend\assets\PKAsset;
PKAsset::register($this);
/* @var $this yii\web\View */
/* @var $model frontend\models\Komentar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="komentar-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'cmpg_id')->textInput() ?>

    <?= $form->field($model, 'inv_id')->textInput() ?> -->

    <?= $form->field($model, 'komentar')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
