<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Campaigns';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="campaign-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Campaign', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cmpg_id',
            'cmpg_judul',
            'cmpg_deskripsi',
            'cmpg_cerita:ntext',
            'cmpg_poster',
            //'cmpg_namaposter',
            //'cmpg_targetdana',
            //'cmpg_durasihari',
            //'cmpg_totaldana',
            //'cmpg_laba_inv',
            //'cmpg_laba_pd',
            //'cmpg_kota',
            //'kategori_id',
            //'cmpg_resiko:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
