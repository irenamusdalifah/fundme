<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\dependencies;
use frontend\assets\PKAsset;
PKAsset::register($this);
use yii\helpers\ArrayHelper;
use frontend\models\Role;
// use frontend\assets\MaterialAsset;
// MaterialAsset::register($this);

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="wrapper">
        <div class="page-header" style="background-image: url('../assets/img/login-image.jpg');">
            <div class="filter"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 ml-auto mr-auto">
                            <div class="card card-register">
                                <h3 class="title">Welcome</h3>
                                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                                    <?= $form->field($model, 'email') ?>
                                    <?= $form->field($model, 'password')->passwordInput() ?>
                                    <?= $form->field($model, 'level')->dropDownList(
        ArrayHelper::map(Role::find()->asArray()->all(),'id','role'), ['prompt'=>'Select User'])?>
                                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                                <div class="forgot">
                                    <a href="#" class="btn btn-link btn-danger">Forgot password?</a>
                                </div>
                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                    </div>
					<div class="footer register-footer text-center">
						<h6>&copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by Creative Tim</h6>
					</div>
                </div>
        </div>
    </div>


