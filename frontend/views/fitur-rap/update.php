<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\fiturRap */

$this->title = 'Update Fitur Rap: ' . $model->rap_id;
$this->params['breadcrumbs'][] = ['label' => 'Fitur Raps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rap_id, 'url' => ['view', 'id' => $model->rap_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fitur-rap-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
