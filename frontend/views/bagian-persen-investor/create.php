<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\BagianPersenInvestor */

$this->title = 'Create Bagian Persen Investor';
$this->params['breadcrumbs'][] = ['label' => 'Bagian Persen Investors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bagian-persen-investor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
