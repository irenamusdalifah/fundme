<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PengajuDanaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengaju Danas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengaju-dana-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pengaju Dana', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pd_id',
            'pd_namadepan',
            'pd_namabelakang',
            'pd_nik',
            'pd_foto',
            //'pd_foto_kartu',
            //'pd_alamat',
            //'pd_kota',
            //'pd_tgllahir',
            //'pd_telepon',
            //'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
