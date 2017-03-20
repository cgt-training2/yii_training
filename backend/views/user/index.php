<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <div class="card">
        <div class="card-header" data-background-color="purple">
            <div class="row">
                <div class="col-sm-9">
                    <h2 class="title"><?= Html::encode($this->title) ?></h2>
                </div>
                <div class="col-sm-3">
                    <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success btn-block']) ?>
                </div>
            </div>
        </div>
        <div class="card-content table-responsive">    
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
            <?php Pjax::begin(); ?>    <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                   // ['class' => 'yii\grid\SerialColumn'],
                    'id',
                    'username',
                    //'auth_key',
                    //'password_hash',
                    //'password_reset_token',
                    // 'email:email',
                    // 'status',
                     'created_at',
                    // 'updated_at',

                    ['class' => 'backend\grid\ActionColumn'],
                ],
            ]); ?>
            <?php Pjax::end(); ?>
        </div>
    </div>
</div>
