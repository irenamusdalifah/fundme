<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PenarikanInvestasiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penarikan-investasi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pi_id') ?>

    <?= $form->field($model, 'cmpg_id') ?>

    <?= $form->field($model, 'janji_laba') ?>

    <?= $form->field($model, 'opsi_satu_tahun') ?>

    <?= $form->field($model, 'opsi_dua_tahun') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
