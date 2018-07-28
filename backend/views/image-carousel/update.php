<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\ImageCarousel */

$this->title = 'Update Image Carousel: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Image Carousels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="image-carousel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
