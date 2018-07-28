<?php

use yii\helpers\Html;
use frontend\assets\PKAsset;
PKAsset::register($this);
/* @var $this yii\web\View */
/* @var $model frontend\models\PenarikanInvestasi */

$this->title = 'Update Penarikan Investasi: ' . $model->pi_id;
$this->params['breadcrumbs'][] = ['label' => 'Penarikan Investasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pi_id, 'url' => ['view', 'id' => $model->pi_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="penarikan-investasi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
