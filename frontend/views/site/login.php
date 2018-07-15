<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\dependencies;
// if (class_exists('ramosisw\CImaterial\web\MaterialAsset')) {
//   ramosisw\CImaterial\web\MaterialAsset::register($this);
// }

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
  <br>
  <br>
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header text-center" data-background-color="purple">
          <h4>Login</h4>
        </div>

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <div class="card-content">
          <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
          <?= $form->field($model, 'password')->passwordInput() ?>
          <?= $form->field($model, 'rememberMe')->checkbox() ?>

          <?= Html::submitButton('Login', ['class' => 'btn btn-primary center', 'name' => 'login-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
      </div>
    </div>
    <div class="col-md-4"></div>
  </div>
</div>
