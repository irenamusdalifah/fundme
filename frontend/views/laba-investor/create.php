<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\LabaInvestor */

$this->title = 'Create Laba Investor';
$this->params['breadcrumbs'][] = ['label' => 'Laba Investors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laba-investor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
