<?php

use yii\helpers\Html;
use frontend\assets\PKAsset;
PKAsset::register($this);

/* @var $this yii\web\View */
/* @var $model frontend\models\PenarikanInvestasi */

$this->title = 'Create Penarikan Investasi';
$this->params['breadcrumbs'][] = ['label' => 'Penarikan Investasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penarikan-investasi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
