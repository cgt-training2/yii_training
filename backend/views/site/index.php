<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">

       <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">content_copy</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Company</p>
                        <h3 class="title"><?php echo $companyCount; ?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="<?php echo Yii::$app->homeUrl;?>company">View full detail...</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="material-icons">store</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Branch</p>
                        <h3 class="title"><?php echo $brachCount ?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">remove_red_eye</i> <a href="<?php echo Yii::$app->homeUrl;?>branch">View full detail...</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="red">
                        <i class="material-icons">info_outline</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Department</p>
                        <h3 class="title"><?php echo $departmentCount; ?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">remove_red_eye</i> <a href="<?php echo Yii::$app->homeUrl;?>department">View full detail...</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="card-content">
                        <p class="category">Users</p>
                        <h3 class="title"><?php echo $userCount; ?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">remove_red_eye</i> <a href="<?php echo Yii::$app->homeUrl;?>user">View full detail...</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
