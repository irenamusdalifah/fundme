<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TransaksiCampaignSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transaksi Campaigns';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-campaign-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Transaksi Campaign', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tc_id',
            'inv_id',
            'cmpg_id',
            'tc_tanggal',
            'tc_dana',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
