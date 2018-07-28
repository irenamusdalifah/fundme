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
                                        <?php echo "Rp. " .number_format($datas[0]['inv_saldo'],0,',','.');?>
                                        <b><?php //echo $datas['invsaldo'];?> </b><br>
                                        <p><?php //echo $datas['cmpg_kota'];?></p>
                                    </h1>
                                </div>
                            </div>
                            
                            <?= Html::a('Tambah Saldo', ['riwayat-saldo-inv/create', 'id' => $datas[0]['inv_id']], ['class' => 'btn btn-info']) ?>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
                        <div class="col-md-2"></div>

        </div>

    </div>
</div>
