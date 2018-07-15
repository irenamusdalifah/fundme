<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\fiturRapSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fitur-rap-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'rap_id') ?>

    <?= $form->field($model, 'cmpg_id') ?>

    <?= $form->field($model, 'rap_tgl') ?>

    <?= $form->field($model, 'rap_file') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
