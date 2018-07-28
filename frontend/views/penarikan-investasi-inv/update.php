<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\PenarikanInvestasiInv */

$this->title = 'Update Penarikan Investasi Inv: ' . $model->pi_inv_id;
$this->params['breadcrumbs'][] = ['label' => 'Penarikan Investasi Invs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pi_inv_id, 'url' => ['view', 'id' => $model->pi_inv_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="penarikan-investasi-inv-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
