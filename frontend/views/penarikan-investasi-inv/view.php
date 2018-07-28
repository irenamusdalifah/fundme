<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\PenarikanInvestasiInv */

$this->title = $model->pi_inv_id;
$this->params['breadcrumbs'][] = ['label' => 'Penarikan Investasi Invs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penarikan-investasi-inv-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pi_inv_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pi_inv_id], [
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
            'pi_inv_id',
            'pi_id',
            'inv_id',
            'tgl_awal_usaha',
            'tgl_dimulai',
            'tgl_kembali',
        ],
    ]) ?>

</div>
