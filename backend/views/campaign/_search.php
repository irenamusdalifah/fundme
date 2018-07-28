<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CampaignSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="campaign-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cmpg_id') ?>

    <?= $form->field($model, 'cmpg_judul') ?>

    <?= $form->field($model, 'cmpg_deskripsi') ?>

    <?= $form->field($model, 'cmpg_cerita') ?>

    <?= $form->field($model, 'cmpg_poster') ?>

    <?php // echo $form->field($model, 'cmpg_namaposter') ?>

    <?php // echo $form->field($model, 'cmpg_targetdana') ?>

    <?php // echo $form->field($model, 'cmpg_durasihari') ?>

    <?php // echo $form->field($model, 'cmpg_totaldana') ?>

    <?php // echo $form->field($model, 'cmpg_laba_inv') ?>

    <?php // echo $form->field($model, 'cmpg_laba_pd') ?>

    <?php // echo $form->field($model, 'cmpg_kota') ?>

    <?php // echo $form->field($model, 'cmpg_kategori_id') ?>

    <?php // echo $form->field($model, 'cmpg_kategori') ?>

    <?php // echo $form->field($model, 'cmpg_resiko') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'cmpg_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
