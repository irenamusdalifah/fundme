<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
//use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\dependencies;
// if (class_exists('ramosisw\CImaterial\web\MaterialAsset')) {
//     ramosisw\CImaterial\web\MaterialAsset::register($this);
// }
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
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<nav class="navbar navbar-expand-md bg-info fixed-top" color-on-scroll="0">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="http://localhost/fundme/">FundMe</a>
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
                </ul>
            </div>

    
   <?php }else{ ?>

    <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="http://localhost/fundme/campaign/index" class="nav-link"><i class="nc-icon nc-layout-11"></i>Campaignmu</a>
                    </li>
                    <li class="nav-item">
                        <a href="http://localhost/fundme/pengaju-dana/index" class="nav-link"><i class="nc-icon nc-book-bookmark"></i>Profil</a>
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
<!-- <div class="wrap">
    <?php

    $usrd = Yii::$app->user->id;
    
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
        ['label' => 'Buat Campaign', 'url' => ['/campaign/index']],
        ['label' => 'Profil', 'url' => ['/pengaju-dana/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?> -->

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>