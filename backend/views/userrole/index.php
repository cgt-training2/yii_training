<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AuthItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Roles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-index">
    <div class="card">
        <div class="card-header" data-background-color="purple">
            <div class="row">
                <div class="col-sm-9">
                    <h2 class="title"><?= Html::encode($this->title) ?></h2>
                </div>
                <div class="col-sm-3">
                    <?= Html::a('Create User Role', ['create'], ['class' => 'btn btn-success btn-block']) ?>
                </div>
            </div>
        </div>
       <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <div class="card-content table-responsive">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'name',
                    //'type',
                    'description:ntext',
                    'rule_name',
                    'data',
                    // 'created_at',
                    // 'updated_at',

                    ['class' => 'backend\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
