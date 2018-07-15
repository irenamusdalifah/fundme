<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Laporan */

$this->title = 'Update Laporan: ' . $model->lap_id;
$this->params['breadcrumbs'][] = ['label' => 'Laporans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->lap_id, 'url' => ['view', 'id' => $model->lap_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="laporan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
