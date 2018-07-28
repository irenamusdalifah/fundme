		<?php
        use yii\helpers\Html;

        $orderid = date('Y-m-d H:i:s');
        // var_dump($orderid);
        // die();


        ?>
        <!-- <div class="page-header" data-parallax="true" style="background-image: url('http://localhost/fundme/frontend/web/pk2-free/img/daniel-olahh.jpg');">
			<div class="filter"></div>
			<div class="container">
			    <div class="motto text-center">
			        <h1>Example page</h1>
			        <h3>Start designing your landing page here.</h3>
			        <br />
			        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-outline-neutral btn-round"><i class="fa fa-play"></i>Watch video</a>
			        <button type="button" class="btn btn-outline-neutral btn-round">Download</button>
			    </div>
			</div>
    	</div> -->

    <div class="main">
        <h2 class="title"></h2>
        <h2 class="title"></h2>
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

        <div class="content">
    <div class="container-fluid">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"><b>Rekomendasi Campaign Untukmu</b></h4>
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-4">
                  <div class="card card-profile card-plain" style="width: 20rem;">
                    <img class="card-img-top" src="<?php echo (Yii::$app->request->baseUrl . '/'. $data2s[4]['cmpg_namaposter']);?>" style="width: 320px; height: 180px;" alt="Card image cap">
                    <div class="card-body">
                      <h4 class="card-title"><?php echo $data2s[4]['cmpg_judul'];?></h4>
                      <p class="card-text"><?php echo $data2s[4]['cmpg_deskripsi'];?></p>
                      <?= Html::a('Detail', ['cari-campaign/detail', 'id' => $data2s[4]['cmpg_id']], ['class' => 'btn btn-primary']) ?>   
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="card card-profile card-plain" style="width: 20rem;">
                    <img class="card-img-top" src="<?php echo Yii::$app->request->baseUrl . '/'. $data2s[5]['cmpg_namaposter'];?>" style="width: 320px; height: 180px;" alt="Card image cap">
                    <div class="card-body">
                      <h4 class="card-title"><?php echo $data2s[5]['cmpg_judul'];?></h4>
                      <p class="card-text"><?php echo $data2s[5]['cmpg_deskripsi'];?></p>
                      <?= Html::a('Detail', ['cari-campaign/detail', 'id' => $data2s[5]['cmpg_id']], ['class' => 'btn btn-primary']) ?>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="card card-profile card-plain" style="width: 20rem;">
                    <img class="card-img-top" src="<?php echo Yii::$app->request->baseUrl . '/'. $data2s[6]['cmpg_namaposter'];?>" style="width: 320px; height: 180px;" alt="Card image cap">
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
            <div class="section text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <h2 class="title">Let's talk product</h2>
                        <h5 class="description">This is the paragraph where you can write more details about your product. Keep you user engaged by providing meaningful information. Remember that by this time, the user is curious, otherwise he wouldn't scroll to get here. Add a button if you want the user to see more.</h5>
                        <br>
                        <a href="#paper-kit" class="btn btn-danger btn-round">See Details</a>
                    </div>
                </div>
                <br/><br/>
                <div class="row">
                    <div class="col-md-3">
                        <div class="info">
                            <div class="icon icon-danger">
                                <i class="nc-icon nc-album-2"></i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">Beautiful Gallery</h4>
                                <p class="description">Spend your time generating new ideas. You don't have to think of implementing.</p>
                                <a href="#pkp" class="btn btn-link btn-danger">See more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info">
                            <div class="icon icon-danger">
                                <i class="nc-icon nc-bulb-63"></i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">New Ideas</h4>
                                <p>Larger, yet dramatically thinner. More powerful, but remarkably power efficient.</p>
                                <a href="#pkp" class="btn btn-link btn-danger">See more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info">
                            <div class="icon icon-danger">
                                <i class="nc-icon nc-chart-bar-32"></i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">Statistics</h4>
                                <p>Choose from a veriety of many colors resembling sugar paper pastels.</p>
                                <a href="#pkp" class="btn btn-link btn-danger">See more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info">
                            <div class="icon icon-danger">
                                <i class="nc-icon nc-sun-fog-29"></i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">Delightful design</h4>
                                <p>Find unique and handmade delightful designs related items directly from our sellers.</p>
                                <a href="#pkp" class="btn btn-link btn-danger">See more</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>



        <div class="section section-dark text-center">
            <div class="container">
                <h2 class="title">Let's talk about us</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-profile card-plain">
                            <div class="card-avatar">
                                <a href="#avatar"><img src="http://localhost/fundme/frontend/web/pk2-free/img/faces/clem-onojeghuo-3.jpg" alt="..."></a>
                            </div>
                            <div class="card-body">
                                <a href="#paper-kit">
                                    <div class="author">
                                        <h4 class="card-title">Henry Ford</h4>
                                        <h6 class="card-category">Product Manager</h6>
                                    </div>
                                </a>
                                <p class="card-description text-center">
                                Teamwork is so important that it is virtually impossible for you to reach the heights of your capabilities or make the money that you want without becoming very good at it.
                                </p>
                            </div>
                            <div class="card-footer text-center">
                                <a href="#pablo" class="btn btn-link btn-just-icon btn-neutral"><i class="fa fa-twitter"></i></a>
                                <a href="#pablo" class="btn btn-link btn-just-icon btn-neutral"><i class="fa fa-google-plus"></i></a>
                                <a href="#pablo" class="btn btn-link btn-just-icon btn-neutral"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-profile card-plain">
                            <div class="card-avatar">
                                <a href="#avatar"><img src="http://localhost/fundme/frontend/web/pk2-free/img/faces/joe-gardner-2.jpg" alt="..."></a>
                            </div>
                            <div class="card-body">
                                <a href="#paper-kit">
                                    <div class="author">
                                        <h4 class="card-title">Sophie West</h4>
                                        <h6 class="card-category">Designer</h6>
                                    </div>
                                </a>
                                <p class="card-description text-center">
                                A group becomes a team when each member is sure enough of himself and his contribution to praise the skill of the others. No one can whistle a symphony. It takes an orchestra to play it.
                                </p>
                            </div>
                            <div class="card-footer text-center">
                                <a href="#pablo" class="btn btn-link btn-just-icon btn-neutral"><i class="fa fa-twitter"></i></a>
                                <a href="#pablo" class="btn btn-link btn-just-icon btn-neutral"><i class="fa fa-google-plus"></i></a>
                                <a href="#pablo" class="btn btn-link btn-just-icon btn-neutral"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-profile card-plain">
                            <div class="card-avatar">
                                <a href="#avatar"><img src="http://localhost/fundme/frontend/web/pk2-free/img/faces/erik-lucatero-2.jpg" alt="..."></a>
                            </div>
                            <div class="card-body">
                                <a href="#paper-kit">
                                    <div class="author">
                                        <h4 class="card-title">Robert Orben</h4>
                                        <h6 class="card-category">Developer</h6>
                                    </div>
                                </a>
                                <p class="card-description text-center">
                                The strength of the team is each individual member. The strength of each member is the team. If you can laugh together, you can work together, silence isn’t golden, it’s deadly.
                                </p>
                            </div>
                            <div class="card-footer text-center">
                                <a href="#pablo" class="btn btn-link btn-just-icon btn-neutral"><i class="fa fa-twitter"></i></a>
                                <a href="#pablo" class="btn btn-link btn-just-icon btn-neutral"><i class="fa fa-google-plus"></i></a>
                                <a href="#pablo" class="btn btn-link btn-just-icon btn-neutral"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="section landing-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 ml-auto mr-auto">
                            <h2 class="text-center">Keep in touch?</h2>
                            <form class="contact-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="nc-icon nc-single-02"></i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Email</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="nc-icon nc-email-85"></i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <label>Message</label>
                                <textarea class="form-control" rows="4" placeholder="Tell us your thoughts and feelings..."></textarea>
                                <div class="row">
                                    <div class="col-md-4 ml-auto mr-auto">
                                        <button class="btn btn-danger btn-lg btn-fill">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        

        
	<footer class="footer section-dark">
		<div class="container">
			<div class="row">
				<nav class="footer-nav">
					<ul>
						<li><a href="https://www.creative-tim.com">Creative Tim</a></li>
						<li><a href="http://blog.creative-tim.com">Blog</a></li>
						<li><a href="https://www.creative-tim.com/license">Licenses</a></li>
					</ul>
				</nav>
				<div class="credits ml-auto">
					<span class="copyright">
						© <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
					</span>
				</div>
			</div>
		</div>
	</footer>
</body>

<!-- Core JS Files -->
<script src="http://localhost/fundme/frontend/web/pk2-free/js/jquery-3.2.1.js" type="text/javascript"></script>
<script src="http://localhost/fundme/frontend/web/pk2-free/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
<script src="http://localhost/fundme/frontend/web/pk2-free/js/popper.js" type="text/javascript"></script>
<script src="http://localhost/fundme/frontend/web/pk2-free/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Paper Kit Initialization snd functons -->
<script src="http://localhost/fundme/frontend/web/pk2-free/js/paper-kit.js?v=2.1.0"></script>

</html>
