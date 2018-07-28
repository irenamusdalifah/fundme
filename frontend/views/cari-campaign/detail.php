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
                                        <b><?php echo $datas['cmpg_judul'];?> </b><br>
                                        <p><?php echo $datas['cmpg_kota'];?></p>
                                    </h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <?php echo Html::img(Yii::$app->request->baseUrl . '/'. $datas['cmpg_namaposter'], ['width' => '700px','height' => '400px']);
                                        ?>
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h3 class="title"><b>Target Dana</b>
                                            <p>
                                                <?php echo "Rp. " .number_format($datas['cmpg_targetdana'],0,',','.');?> 
                                            </p>
                                        </h3>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h3 class="title"><b>Cerita Kami</b>
                                            <p>
                                                <?php echo $datas['cmpg_cerita'];?>  
                                            </p>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                           <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h3 class="title"><b>Resiko</b>
                                            <p>
                                                <?php echo $datas['cmpg_resiko'];?>  
                                            </p>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            
                            <?= Html::a('Berikan Komentar', ['komentar/create', 'id' => $datas['cmpg_id']], ['class' => 'btn btn-info pull-left']) ?>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <h3 class="title">
                                    <b><?php echo "Rp. " .number_format($datas['cmpg_totaldana'],0,',','.');?></b><br><br>
                                    <p><?php echo $persenan; ?>% dari target dana</p>
                                    <p>
                                        <b><?php echo "Rp. " .number_format($datas['cmpg_targetdana'],0,',','.');?></b>
                                    </p>
                                </h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" style="width: <?php echo $persenan; ?>%" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <h3 class="title">
                                    <b>Laba</b><br><br>
                                    <p><?php echo $datas['cmpg_laba_pd'];?>% Laba untuk Pengaju Dana</p>
                                    <p><?php echo $datas['cmpg_laba_inv'];?>% Laba untuk Investor</p><br>
                                    <p><?php echo $data2s[0]['count(distinct inv_id)'];?> Investor</p><br>
                                </h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                    <?= Html::a('Lakukan Transaksi', ['transaksi-campaign/create', 'id' => $datas['cmpg_id']], ['class' => 'btn btn-info']) ?>
                            </div>
                        </div>
                        
                    </div>
                    <hr>
                    <div class="button-container mr-auto ml-auto">
                        <p>© FundMe | 2018 </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
