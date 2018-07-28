<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\LabaInvestorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laba Investors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laba-investor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Laba Investor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'lap_id',
            'inv_id',
            'bulan',
            'laba',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
