<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\fiturRap */

$this->title = $model->rap_id;
$this->params['breadcrumbs'][] = ['label' => 'Fitur Raps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fitur-rap-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->rap_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->rap_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'rap_id',
            'cmpg_id',
            'rap_tgl',
            'rap_file',
        ],
    ]) ?>

</div>
