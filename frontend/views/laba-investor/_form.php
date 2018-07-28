<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\LabaInvestor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laba-investor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lap_id')->textInput() ?>

    <?= $form->field($model, 'inv_id')->textInput() ?>

    <?= $form->field($model, 'bulan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'laba')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
