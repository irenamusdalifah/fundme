<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CampaignSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Campaigns';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="campaign-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Campaign', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cmpg_id',
            'cmpg_judul',
            //'cmpg_deskripsi',
            //'cmpg_cerita:ntext',
            //'cmpg_poster',
            //'cmpg_namaposter',
            //'cmpg_targetdana',
            //'cmpg_durasihari',
            //'cmpg_totaldana',
            //'cmpg_laba_inv',
            //'cmpg_laba_pd',
            //'cmpg_kota',
            //'cmpg_kategori_id',
            //'cmpg_kategori',
            //'cmpg_resiko:ntext',
            //'user_id',
            'cmpg_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
