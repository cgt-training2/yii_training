<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\DashboardAsset;
use yii\helpers\Html;
//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use frontend\models\AuthAssignment;

DashboardAsset::register($this);
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

<div class="wrapper">
    <?php
   /* NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
    ];
    if (Yii::$app->user->isGuest) {
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
    NavBar::end();*/
    ?>

    <div class="sidebar" data-color="purple" data-image="<?= Yii::$app->request->baseUrl ?>/img/sidebar-1.jpg">
            <!--
                Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

                Tip 2: you can also add an image using data-image tag
            -->

            <div class="logo">
                <a href="<?php echo Yii::$app->homeUrl;?>" class="simple-text">
                    Admin Panel
                </a>
            </div>

            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="active">
                        <a href="<?php echo Yii::$app->homeUrl;?>">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::$app->homeUrl;?>company">
                            <i class="material-icons">person</i>
                            <p>Company</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::$app->homeUrl;?>branch">
                            <i class="material-icons">content_paste</i>
                            <p>Branch</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::$app->homeUrl;?>department">
                            <i class="material-icons">library_books</i>
                            <p>Department</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::$app->homeUrl;?>po">
                            <i class="material-icons">bubble_chart</i>
                            <p>Po</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::$app->homeUrl;?>user">
                            <i class="material-icons">person</i>
                            <p>User</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::$app->homeUrl;?>userrole">
                            <i class="material-icons">bubble_chart</i>
                            <p>User Role</p>
                        </a>
                    </li>
                </ul>
            </div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand " href="#">
                    <?php $authAssignment = AuthAssignment::find()->where(['user_id' => Yii::$app->user->identity->id])->one(); ?>
                    <b><?= Yii::$app->user->identity->username ?> [<?= $authAssignment->item_name; ?>]</b></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">dashboard</i>
                                <p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">notifications</i>
                                <span class="notification">5</span>
                                <p class="hidden-lg hidden-md">Notifications</p>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Mike John responded to your email</a></li>
                                <li><a href="#">You have 5 new tasks</a></li>
                                <li><a href="#">You're now friend with Andrew</a></li>
                                <li><a href="#">Another Notification</a></li>
                                <li><a href="#">Another One</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                               <i class="material-icons">person</i>
                               <p class="hidden-lg hidden-md">Profile</p>
                            </a>
                            <ul class="dropdown-menu">
                                <li><?php 
                                    if (Yii::$app->user->isGuest) {
                                        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
                                    } else {
                                        
                                           echo  Html::beginForm(['/site/logout'], 'post')
                                            . Html::submitButton(
                                                'Logout (' . Yii::$app->user->identity->username . ')',
                                                ['class' => 'btn btn-primary btn-block']
                                            )
                                            . Html::endForm();
                                        
                                    }
                                ?></li>
                            </ul>
                        </li>
                    </ul>

                    <form class="navbar-form navbar-right" role="search">
                        <div class="form-group  is-empty">
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="material-input"></span>
                        </div>
                        <button type="submit" class="btn btn-white btn-round btn-just-icon">
                            <i class="material-icons">search</i><div class="ripple-container"></div>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<script type="text/javascript">
$(function(){

    var url = window.location.pathname, 
        urlRegExp = new RegExp(url.replace(/\/$/,'') + "$"); // create regexp to match current url pathname and remove trailing slash if present as it could collide with the link in navigation in case trailing slash wasn't present there
        // now grab every link from the navigation
        //alert(url);
        $('.sidebar-wrapper .nav a').each(function(){
            // and test its normalized href against the url pathname regexp
            
            if(urlRegExp.test(this.href.replace(/\/$/,''))){
                $(this).parent('li').addClass('active');
            }else{
                $(this).parent('li').removeClass('active');
            }
        });

});
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#searbarsearch').on('keyup', function () {
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