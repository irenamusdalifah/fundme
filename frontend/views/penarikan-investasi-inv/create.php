<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\PenarikanInvestasiInv */

$this->title = 'Create Penarikan Investasi Inv';
$this->params['breadcrumbs'][] = ['label' => 'Penarikan Investasi Invs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penarikan-investasi-inv-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
