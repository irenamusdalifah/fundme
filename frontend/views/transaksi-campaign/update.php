<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TransaksiCampaign */

$this->title = 'Update Transaksi Campaign: ' . $model->tc_id;
$this->params['breadcrumbs'][] = ['label' => 'Transaksi Campaigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tc_id, 'url' => ['view', 'id' => $model->tc_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="transaksi-campaign-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
