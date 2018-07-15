<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\LaporanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laporan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'lap_id') ?>

    <?= $form->field($model, 'cmpg_id') ?>

    <?= $form->field($model, 'lap_bulan') ?>

    <?= $form->field($model, 'lap_tahun') ?>

    <?= $form->field($model, 'lap_totallaba') ?>

    <?php // echo $form->field($model, 'lap_file') ?>

    <?php // echo $form->field($model, 'lap_tgl') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
