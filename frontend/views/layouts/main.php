<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;


use yii\bootstrap\Tabs;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">

    <div class="section1">
    <?php
    NavBar::begin([
        //'brandLabel' => 'My Company',
        'brandLabel' => Html::img('@web/img/logo.png', ['alt'=>Yii::$app->name,'class'=>'logo']),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',

        ],
        'innerContainerOptions' => ['class'=>'container-fluid'],
    ]);
    $menuItems = [
        ['label' => 'Student Class', 'url' => ['/site/index'],
            'items'=>[
                ['label' => 'Search Tutor', 'url' => ['/']],
                ['label' => 'Search Academic Class', 'url' => ['/']]
            ]
        ],
        ['label' => 'Company','url'=>['/company']],
        ['label' => 'Branch','url'=>['/branch']],
        ['label' => 'Department','url'=>['/department']],
        ['label' => 'Blog','url'=>['/']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItemsR[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItemsR[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItemsR[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }

    $menuItemsR[] = ['label' => 'Post Ads','options'=>['class'=>'btn-primary postads'],
                        'items' =>  [['label'=>'Post ads 1', 'url' => ['/']],
                                     ['label'=>'Post ads 2', 'url' => ['/']]
                                    ],
                    ];
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $menuItems,
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItemsR,
    ]);
    NavBar::end();
    ?>
    <header id="myCarousel" class="carousel slide">
        <div class="sliderblack">
            <div class="container">
                <h1>Necesitas Classes</h1>
                <div class="searchblock">
                    <?php 
                    echo Tabs::widget([
                        'encodeLabels' => false,
                        'items' => [
                            [
                                'label' => Html::tag('span', Html::img('@web/img/Forma 1.png'),['class' => 'btn btn-default btn-circle btn-xl']).Html::tag('p','Tutor/Academy'),
                                'content' => '<form>
                            <div class="form-group col-sm-6">
                                <input type="text" placeholder="Enter Keyword" class="form-control">
                            </div>
                            <div class="form-group col-sm-2">
                                <select class="form-control">
                                    <option>State</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-2">
                                <select class="form-control">
                                    <option>Location</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-2">
                                <button type="button" class="btn btn-primary btn-block">Search</button>
                            </div>
                          </form>',
                                'options'=>['id' => 'Tutor'],
                                'active' => true,
                            ],
                            [
                                'label' => Html::tag('span', Html::img('@web/img/Forma 11.png'),['class' => 'btn btn-default btn-circle btn-xl']).Html::tag('p','Student'),
                                'content' => '<h3>Menu 1</h3>
                          <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>',
                                'options' => ['id' => 'student'],
                            ],
                            [
                                'label' => Html::tag('span', Html::img('@web/img/Forma 11.png'),['class' => 'btn btn-default btn-circle btn-xl']).Html::tag('p','Exchange'),
                                'content' => '<h3>exchange</h3>
                          <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>',
                                'options' => ['id' => 'exchange'],
                            ],
                            
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url(<?= Yii::$app->request->baseUrl ?>/img/slider/Layer23.png);"></div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url(<?= Yii::$app->request->baseUrl ?>/img/slider/studentsheader.png);"></div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url(<?= Yii::$app->request->baseUrl ?>/img/slider/Layer23.png);"></div>
            </div>
        </div>
    </header>
    
    </div>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<div class="footertop">
    <div class="container">
        <p>FOLLOW US 
        <a href="#"><?= Html::img('@web/img/slicing/facebook2.png')?></a>
        <a href="#"><?= Html::img('@web/img/slicing/twitter.png')?></a>
        <a href="#"><?= Html::img('@web/img/slicing/google-plus.png')?></a>
        <a href="#"><?= Html::img('@web/img/slicing/Forma 13.png')?></a>
        <a href="#"><?= Html::img('@web/img/slicing/Forma 14.png')?></a>
        </p>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <!--<p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>-->
        <div class="row">
            <div class="col-xs-12 col5">
                <h5><b>SOBRE BUSCA TU CLASE</b></h5>

                
                <ul class="list-group">

                <?= Html::tag('li', Html::a('Profile', ['user/view'], ['class' => 'profile-link']), ['class' => 'username']) ?>
                    <li><a href="#">Como functiono</a></li>
                    <li><a href="#">Como functiono</a></li>
                    <li><a href="#">Como functiono</a></li>
                    <li><a href="#">Como functiono</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col5">
                <h5><b>MI CHUINTA</b></h5>
                <ul class="list-group">
                    <li><a href="#">Como functiono</a></li>
                    <li><a href="#">Como functiono</a></li>
                    <li><a href="#">Como functiono</a></li>
                    <li><a href="#">Como functiono</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col5">
                <h5><b>ANUNCIOS</b></h5>
                <ul class="list-group">
                    <li><a href="#">Como functiono</a></li>
                    <li><a href="#">Como functiono</a></li>
                    <li><a href="#">Como functiono</a></li>
                    <li><a href="#">Como functiono</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col5">
                <h5><b>CONOCENOS</b></h5>
                <ul class="list-group">
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contact us</a></li>
                    <li><a href="#">Como functiono</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col5">
                <h5><b>READ SOCIAL</b></h5>
                
                <ul class="list-group">
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Linked In</a></li>
                    <li><a href="#">Google Plus</a></li>
                    <li><a href="#">Youtube</a></li>
                </ul>
            </div>

        </div>
    </div>
    <button class="btn btn-primary">REPORT A BUG</button>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
    <script type="text/javascript">
    $(document).ready(function () {
        $('#companysearch-company_name').on('keyup', function () {
            var form = $('#w0');
            // return false if form still have some validation errors
            $(form).keydown(function(event){
                if(event.keyCode == 13) {
                  event.preventDefault();
                  return false;
                }
              });
            if (form.find('.has-error').length) 
            {
                return false;
            }
          
            // submit form
            $.ajax({
            url    : form.attr('action'),
            type   : 'get',
            data   : form.serialize(),
            success: function (response) 
            {
                // /$.pjax.reload('#hello'); //for pjax update
                $('#hello').html(response);
                console.log(getupdatedata);
            },
            error  : function () 
            {
                console.log('internal server error');
            }
            });
            return false;
         });
    });
</script>
