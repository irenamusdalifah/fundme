<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BagianPersenInvestorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bagian Persen Investors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bagian-persen-investor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bagian Persen Investor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'inv_id',
            'cmpg_id',
            'total_investasi',
            'persen',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
