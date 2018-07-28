<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PenarikanInvestasiInv */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penarikan-investasi-inv-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pi_id')->textInput() ?>

    <?= $form->field($model, 'inv_id')->textInput() ?>

    <?= $form->field($model, 'tgl_awal_usaha')->textInput() ?>

    <?= $form->field($model, 'tgl_dimulai')->textInput() ?>

    <?= $form->field($model, 'tgl_kembali')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
