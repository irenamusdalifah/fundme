<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
// use frontend\assets\MaterialAsset;

// if (class_exists('ramosisw\CImaterial\web\MaterialAsset')) {
//     ramosisw\CImaterial\web\MaterialAsset::register($this);
// }
use frontend\assets\PKAsset;
PKAsset::register($this);
?>
<!-- <h1>cari-penjahit/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>
 -->

  <!-- </div> -->
  <div class="wrapper">
    <div class="container" style="padding: 25px;">
    	<div class="row">
    		 <div class="col-md-12 col-sm-12" >
			      <div class="card">
			          <div class="card-body">
			          	<?php
			          		$n=0; foreach ($datas as $key): $n++; {?>
			          			<div class="card">
			          				<div class="col-md-12">
			          					<div class="card-body">
			          						<div class="col-md-4">
			          							<?php echo Html::img(Yii::$app->request->baseUrl . '/'. $key['cmpg_namaposter'], ['width' => '250px','height' => '250px;']);?>
			          						</div>
			          						<div class="col-md-8">
			          							<h2 class="title">
			          								<?php echo $key['cmpg_judul'];?>
			          							</h2>
			          							<p><?php echo $key['cmpg_deskripsi'];?></p>
			          							<p><?php echo "Rp. " .number_format($key['cmpg_targetdana'],0,',','.');?> </p>
			          							<p><?php echo $key['cmpg_kategori'];?></p>
			          						</div>
			          					</div>
			          					<div class="card-footer">
			          						<?= Html::a('Detail', ['detail', 'id' => $key['cmpg_id']], ['class' => 'btn btn-primary pull-right']) ?>
			          					<?= Html::a('Lakukan Transaksi', ['transaksi-campaign/create', 'id' => $key['cmpg_id']], ['class' => 'btn btn-success pull-right']) ?>
			          				</div>
			          					</div>
			          				</div>
			          	<?php	} 	?>
			          <?php endforeach; ?>
			          </div>
			          <div class="card-footer">
			              <div class="stats">
			                  <i class="material-icons">date_range</i> Last 24 Hours
			              </div>
			          </div>
			      </div>
			  </div>
    	</div>
     <!--  <div class="col-lg-12">
        <div class="card card-stats">
          <div class="card-header card-chart card-header-info"> -->
          	<!-- <div class="row">
          		<div class="col-md-4 pull-left">
          		 	<h4><b>Cari Penjahit</b></h4>
	          	</div>
	          	<div class="col-md-8">
	          		<div class="input-group pull-right">
		                <input type="text" value="" class="form-control" placeholder="Search...">
		                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
		                        <i class="material-icons">search</i>
		                        <div class="ripple-container"></div>
		                    </button>
		            </div>
	          	</div> 
         	</div>
          </div>  
          <div class="card-body">
            <div class="container-fluid">
              
            </div>
          </div>
        </div>
      </div>   -->
    </div>
  </div>
