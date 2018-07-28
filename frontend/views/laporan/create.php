<?php

use yii\helpers\Html;
use frontend\assets\PKAsset;
PKAsset::register($this);

/* @var $this yii\web\View */
/* @var $model frontend\models\Laporan */

$this->title = 'Create Laporan';
$this->params['breadcrumbs'][] = ['label' => 'Laporans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laporan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
