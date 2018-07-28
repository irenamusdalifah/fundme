<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PenarikanInvestasiInvSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penarikan-investasi-inv-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pi_inv_id') ?>

    <?= $form->field($model, 'pi_id') ?>

    <?= $form->field($model, 'inv_id') ?>

    <?= $form->field($model, 'tgl_awal_usaha') ?>

    <?= $form->field($model, 'tgl_dimulai') ?>

    <?php // echo $form->field($model, 'tgl_kembali') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
