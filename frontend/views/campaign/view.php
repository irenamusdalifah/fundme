<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Campaign */
use frontend\assets\PKAsset;
PKAsset::register($this);
$this->title = $model->cmpg_id;
$this->params['breadcrumbs'][] = ['label' => 'Campaigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="campaign-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->cmpg_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->cmpg_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Upload RAP', ['fitur-rap/create', 'id' => $model->cmpg_id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Upload Laporan', ['laporan/index', 'id' => $model->cmpg_id], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Lihat Komentar', ['komentar/index', 'id' => $model->cmpg_id], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Launch!', ['launch', 'id' => $model->cmpg_id], ['class' => 'btn btn-danger']) ?>
        <?= Html::a('Refresh!', ['refresh', 'id' => $model->cmpg_id], ['class' => 'btn btn-danger']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cmpg_id',
            'cmpg_judul',
            'cmpg_deskripsi',
            'cmpg_cerita:ntext',
            'cmpg_poster',
            'cmpg_namaposter',
            [
                'attribute'=>'cmpg_targetdana', 
                'format' => ['decimal',0,'.']
            ],
            'cmpg_durasihari',
            'cmpg_totaldana',
            'cmpg_laba_inv',
            'cmpg_laba_pd',
            'cmpg_kota',
            'cmpg_kategori',
            'cmpg_resiko:ntext',
        ],
    ]) ?>

</div>
