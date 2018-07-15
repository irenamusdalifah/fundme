<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\InvestorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="investor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'inv_id') ?>

    <?= $form->field($model, 'inv_namadepan') ?>

    <?= $form->field($model, 'inv_namabelakang') ?>

    <?= $form->field($model, 'inv_nik') ?>

    <?= $form->field($model, 'inv_gender') ?>

    <?php // echo $form->field($model, 'inv_foto') ?>

    <?php // echo $form->field($model, 'inv_foto_kartu') ?>

    <?php // echo $form->field($model, 'inv_tgllahir') ?>

    <?php // echo $form->field($model, 'inv_alamat') ?>

    <?php // echo $form->field($model, 'inv_kota') ?>

    <?php // echo $form->field($model, 'inv_telepon') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
