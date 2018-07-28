<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Kategori;
// use frontend\assets\MaterialA
use frontend\assets\PKAsset;
PKAsset::register($this);
// if (class_exists('ramosisw\CImaterial\web\MaterialAsset')) {
//     ramosisw\CImaterial\web\MaterialAsset::register($this);
// }
?>
<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="grid-view">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="title">
                                        <!-- <?php //var_dump($persenan);
                                        //die();
                                        ?> -->
                                        <?php $form = ActiveForm::begin(); ?>

                                        
                                        <?= $form->field($model, 'saldo')->input('number',['min'=>50000, 'max'=>10000000, 'placeholder'=>'Masukkan saldo yang ingin ditambah', 'format' => ['decimal',0,',','.']]); ?>

                                        <b><?php //echo $datas['invsaldo'];?> </b><br>
                                        <p><?php //echo $datas['cmpg_kota'];?></p>
                                    </h1>
                                </div>
                            </div>
                            
                            <?= Html::submitButton('Berikan Komentar', ['class' => 'btn btn-info pull-left']) ?>
                            <div class="clearfix"></div>
                            <?php ActiveForm::end(); ?>
                        </form>
                    </div>
                </div>
            </div>
                        <div class="col-md-2"></div>

        </div>

    </div>
</div>
