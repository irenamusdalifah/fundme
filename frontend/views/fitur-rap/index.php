<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\fiturRapSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fitur Raps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fitur-rap-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Fitur Rap', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'rap_id',
            'cmpg_id',
            'rap_tgl',
            'rap_file',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
