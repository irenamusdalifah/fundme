<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\assets\PKAsset;
PKAsset::register($this);
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PenarikanInvestasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penarikan Investasis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penarikan-investasi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Penarikan Investasi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pi_id',
            'cmpg_id',
            'janji_laba',
            'opsi_satu_tahun',
            'opsi_dua_tahun',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
