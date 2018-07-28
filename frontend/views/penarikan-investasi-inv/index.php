<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PenarikanInvestasiInvSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penarikan Investasi Invs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penarikan-investasi-inv-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Penarikan Investasi Inv', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pi_inv_id',
            'pi_id',
            'inv_id',
            'tgl_awal_usaha',
            'tgl_dimulai',
            //'tgl_kembali',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
