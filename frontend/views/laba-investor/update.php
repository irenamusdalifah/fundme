<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\LabaInvestor */

$this->title = 'Update Laba Investor: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Laba Investors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="laba-investor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
