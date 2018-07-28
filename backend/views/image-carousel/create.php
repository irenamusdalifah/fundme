<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\ImageCarousel */

$this->title = 'Create Image Carousel';
$this->params['breadcrumbs'][] = ['label' => 'Image Carousels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="image-carousel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
