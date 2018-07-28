<?php

use yii\helpers\Html;

use frontend\assets\PKAsset;
PKAsset::register($this);
/* @var $this yii\web\View */
/* @var $model frontend\models\TransaksiCampaign */

$this->title = 'Create Transaksi Campaign';
$this->params['breadcrumbs'][] = ['label' => 'Transaksi Campaigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-campaign-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
