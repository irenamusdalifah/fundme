<?php
use yii\helpers\Html;
?>   
<!-- <div class="page-header header-filter" data-parallax="true"> -->
    <h2></h2>
    <h2></h2>
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <h1 class="title">Mari Investasi Mulai Sekarang!</h1>
          <h4 class="title">Every landing page needs a small description after the big bold title, that&apos;s why we added this text here. Add here all the information that can make you or your product create the first impression.</h4>
          <br>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-4" style="padding: 100px;">
          <?= Html::a('Investasikan Uangmu Sekarang!', ['cari-campaign/index'], ['class' => 'btn btn-danger btn-lg pull-right']) ?>
        </div>
      </div>
    </div>
    <div class="main">
            <div class="section" id="carousel">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card page-carousel">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <img class="d-block img-fluid" src="http://localhost/fundme/backend/web/image_carousel/contohusaha1.jpg" alt="First slide">
                                        <div class="carousel-caption d-none d-md-block">
                                            <p><?php echo $datas[0]['keterangan'];?></p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block img-fluid" src="http://localhost/fundme/backend/web/image_carousel/polo.jpg" alt="Second slide">
                                        <div class="carousel-caption d-none d-md-block">
                                            <p><?php echo $datas[1]['keterangan'];?></p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block img-fluid" src="http://localhost/fundme/backend/web/image_carousel/akse.jpg" alt="Third slide">
                                        <div class="carousel-caption d-none d-md-block">
                                            <p><?php echo $datas[2]['keterangan'];?></p>
                                        </div>
                                    </div>
                                    </div>

                                    <a class="left carousel-control carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="fa fa-angle-left"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="fa fa-angle-right"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  <!-- </div> -->
  <div class="content">
    <div class="container-fluid">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"><b>Rekomendasi Model Untukmu</b></h4>
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-4">
                  <div class="card card-profile card-plain" style="width: 20rem;">
                    <img class="card-img-top" src="<?php echo (Yii::$app->request->baseUrl . '/'. $data2s[4]['cmpg_namaposter']);?>" style="width: 200px; height: 100px;" alt="Card image cap">
                    <div class="card-body">
                      <h4 class="card-title"><?php echo $data2s[4]['cmpg_judul'];?></h4>
                      <p class="card-text"><?php echo $data2s[4]['cmpg_deskripsi'];?></p>
                      <?= Html::a('Detail', ['cari-campaign/detail', 'id' => $data2s[4]['cmpg_id']], ['class' => 'btn btn-primary']) ?>    
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="card card-profile card-plain" style="width: 20rem;">
                    <img class="card-img-top" src="<?php echo Yii::$app->request->baseUrl . '/'. $data2s[5]['cmpg_namaposter'];?>" style="width: 200px; height: 100px;" alt="Card image cap">
                    <div class="card-body">
                      <h4 class="card-title"><?php echo $data2s[5]['cmpg_judul'];?></h4>
                      <p class="card-text"><?php echo $data2s[5]['cmpg_deskripsi'];?></p>
                       <?= Html::a('Detail', ['cari-campaign/detail', 'id' => $data2s[5]['cmpg_id']], ['class' => 'btn btn-primary']) ?>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="card card-profile card-plain" style="width: 20rem;">
                    <img class="card-img-top" src="<?php echo Yii::$app->request->baseUrl . '/'. $data2s[6]['cmpg_namaposter'];?>" style="width: 200px; height: 100px;" alt="Card image cap">
                    <div class="card-body">
                      <h4 class="card-title"><?php echo $data2s[6]['cmpg_judul'];?></h4>
                      <p class="card-text"><?php echo $data2s[6]['cmpg_deskripsi'];?></p>
                       <?= Html::a('Detail', ['cari-campaign/detail', 'id' => $data2s[6]['cmpg_id']], ['class' => 'btn btn-primary']) ?>     
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>  
    </div>
  </div>
  <footer class="footer footer-default">
    <div class="container">
      <nav class="float-left">
        <ul>
          <li>
            <a href="https://www.creative-tim.com">
              Creative Tim
            </a>
          </li>
          <li>
            <a href="https://presentation.creative-tim.com">
              About Us
            </a>
          </li>
          <li>
            <a href="https://blog.creative-tim.com">
              Blog
            </a>
          </li>
          <li>
            <a href="https://www.creative-tim.com/license">
              Licenses
            </a>
          </li>
        </ul>
      </nav>
      <div class="copyright float-right">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>, made with <i class="material-icons">favorite</i> by
        <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
      </div>
    </div>
  </footer>
