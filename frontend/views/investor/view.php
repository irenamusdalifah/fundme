<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Investor */
use frontend\assets\PKAsset;
PKAsset::register($this);
$this->title = $model->inv_id;
$this->params['breadcrumbs'][] = ['label' => 'Investors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="investor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->inv_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->inv_id], [
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
            'inv_id',
            'inv_namadepan',
            'inv_namabelakang',
            'inv_nik',
            'inv_gender',
            'inv_foto',
            'inv_foto_kartu',
            'inv_tgllahir',
            'inv_alamat',
            'inv_kota',
            'inv_telepon',
            'user_id',
        ],
    ]) ?>

</div>
