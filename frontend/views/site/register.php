<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\dependencies;
use yii\helpers\ArrayHelper;
use frontend\models\Role;
if (class_exists('ramosisw\CImaterial\web\MaterialAsset')) {
    ramosisw\CImaterial\web\MaterialAsset::register($this);
}

/*$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;*/
?>

<div class="container">
  <br>
  <br>
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header text-center" data-background-color="purple">
          <h4>Login</h4>
      </div>

      <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
      <div class="card-content">
         <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

         <?= $form->field($model, 'email') ?>

         <?= $form->field($model, 'password')->passwordInput() ?>

         <?= $form->field($model, 'level')->dropDownList(
        ArrayHelper::map(Role::find()->asArray()->all(),'id','role'), ['prompt'=>'Select User'])?>

         <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
     </div>

     <?php ActiveForm::end(); ?>
 </div>
</div>
<div class="col-md-3"></div>
</div>
</div>