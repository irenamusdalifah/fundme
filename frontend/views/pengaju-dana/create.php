<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\PengajuDana */

$this->title = 'Create Pengaju Dana';
$this->params['breadcrumbs'][] = ['label' => 'Pengaju Danas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengaju-dana-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
