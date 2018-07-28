<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
$tgl= date("Y-m-d");
use frontend\assets\PKAsset;
PKAsset::register($this);
// echo($tgl);
// die();
/* @var $this yii\web\View */
/* @var $model frontend\models\TransaksiCampaign */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transaksi-campaign-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tc_dana')->input('number',['min'=>50000, 'max'=>500000000, 'placeholder'=>'Masukkan dana yang ingin diinvestasikan']); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
