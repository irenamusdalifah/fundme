<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\PengajuDana */

$this->title = $model->pd_id;
$this->params['breadcrumbs'][] = ['label' => 'Pengaju Danas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengaju-dana-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pd_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pd_id], [
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
            'pd_id',
            'pd_namadepan',
            'pd_namabelakang',
            'pd_nik',
            'pd_foto',
            'pd_foto_kartu',
            'pd_alamat',
            'pd_kota',
            'pd_tgllahir',
            'pd_telepon',
            'user_id',
        ],
    ]) ?>

</div>
