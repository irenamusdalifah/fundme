<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BagianPersenInvestorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bagian-persen-investor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'inv_id') ?>

    <?= $form->field($model, 'cmpg_id') ?>

    <?= $form->field($model, 'total_investasi') ?>

    <?= $form->field($model, 'persen') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
