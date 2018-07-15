<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\PengajuDana */

$this->title = 'Update Pengaju Dana: ' . $model->pd_id;
$this->params['breadcrumbs'][] = ['label' => 'Pengaju Danas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pd_id, 'url' => ['view', 'id' => $model->pd_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pengaju-dana-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
