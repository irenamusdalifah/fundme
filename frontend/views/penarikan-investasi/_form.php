<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\assets\PKAsset;
PKAsset::register($this);
/* @var $this yii\web\View */
/* @var $model frontend\models\PenarikanInvestasi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penarikan-investasi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'janji_laba')->input('number', ['placeholder'=>'Masukkan perkiraan laba yang didapatkan setahun(dalam persen)']) ?>

    <?= $form->field($model, 'opsi_satu_tahun')->input('number', ['placeholder'=>'Masukkan bagian maksimal laba yang akan dikembalikan setahun(dalam persen)']) ?>

    <?= $form->field($model, 'opsi_dua_tahun')->input('number', ['placeholder'=>'Masukkan bagian maksimal laba yang akan dikembalikan dua tahun(dalam persen)']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
