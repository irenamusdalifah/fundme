<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
  use frontend\assets\PKAsset;
PKAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body >
<?php $this->beginBody() ?>

 <nav class="navbar navbar-expand-md bg-info fixed-top" color-on-scroll="0">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="https://www.creative-tim.com">FundMe</a>
                <button class="navbar-toggler navbar-toggler-right navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar"></span>
                    <span class="navbar-toggler-bar"></span>
                    <span class="navbar-toggler-bar"></span>
                </button>
            </div>
      <?php
      if (Yii::$app->user->isGuest){
      ?>

         <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="http://localhost/fundme/cari-campaign" class="nav-link"><i class="nc-icon nc-layout-11"></i>Campaign</a>
                    </li>
                    <li class="nav-item">
                        <a href="http://localhost/fundme/site/login" class="nav-link"><i class="nc-icon nc-book-bookmark"></i>Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="http://localhost/fundme/site/signup" class="nav-link"><i class="nc-icon nc-book-bookmark"></i>Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a href="http://localhost/fundme/site/login" class="nav-link"><i class="nc-icon nc-book-bookmark"></i>Login</a>
                    </li>
                    
                </ul>
            </div>

    
   <?php }else{ ?>

    <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="http://localhost/fundme/history" class="nav-link"><i class="nc-icon nc-layout-11"></i>Riwayat Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a href="http://localhost/fundme/investor/index" class="nav-link"><i class="nc-icon nc-book-bookmark"></i>Profil</a>
                    </li>
                    <li class="nav-item">
                        <a href="http://localhost/fundme/site/signup" class="nav-link"><i class="nc-icon nc-book-bookmark"></i>Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a href="http://localhost/fundme/site/login" class="nav-link"><i class="nc-icon nc-book-bookmark"></i>Login</a>
                    </li>
                    
                </ul>
            </div>

    
            <!-- <a class="nav-link" href="http://localhost/advancedraw/site/Contact" onclick="scrollToDownload()">
              Logout
            </a> -->
           <?= Html::beginForm(['site/logout'], 'post');?>
           <?= Html::submitButton('Logout (' . Yii::$app->user->identity->username . ')',['class' => 'btn btn-link logout'])?>
           <?= Html::endForm();?>
          </li>
        </ul>
      </div>


  <?php }

    ?>
      
    </div>
  </nav>


        <?= Alert::widget() ?>
        <?= $content ?>
    <!-- </div> -->
<!-- </div> -->