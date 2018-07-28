<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\RiwayatSaldoInv */

$this->title = 'Create Riwayat Saldo Inv';
$this->params['breadcrumbs'][] = ['label' => 'Riwayat Saldo Invs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="riwayat-saldo-inv-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
