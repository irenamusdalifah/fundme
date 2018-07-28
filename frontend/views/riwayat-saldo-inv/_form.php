<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\assets\PKAsset;
PKAsset::register($this);
/* @var $this yii\web\View */
/* @var $model frontend\models\RiwayatSaldoInv */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="riwayat-saldo-inv-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'saldo')->input('number') ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
