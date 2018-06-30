<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Campaign */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="campaign-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cmpg_judul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cmpg_deskripsi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cmpg_cerita')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cmpg_poster')->textInput() ?>

    <?= $form->field($model, 'cmpg_namaposter')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cmpg_targetdana')->textInput() ?>

    <?= $form->field($model, 'cmpg_durasihari')->textInput() ?>

    <?= $form->field($model, 'cmpg_totaldana')->textInput() ?>

    <?= $form->field($model, 'cmpg_laba_inv')->textInput() ?>

    <?= $form->field($model, 'cmpg_laba_pd')->textInput() ?>

    <?= $form->field($model, 'cmpg_kota')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kategori_id')->textInput() ?>

    <?= $form->field($model, 'cmpg_resiko')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
