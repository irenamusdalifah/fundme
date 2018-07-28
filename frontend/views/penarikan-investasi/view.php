<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\assets\PKAsset;
PKAsset::register($this);
/* @var $this yii\web\View */
/* @var $model frontend\models\PenarikanInvestasi */

$this->title = $model->pi_id;
$this->params['breadcrumbs'][] = ['label' => 'Penarikan Investasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penarikan-investasi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pi_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pi_id], [
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
            'pi_id',
            'cmpg_id',
            'janji_laba',
            'opsi_satu_tahun',
            'opsi_dua_tahun',
        ],
    ]) ?>

</div>
