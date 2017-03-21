<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\grid\ActionColumn;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Companies';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-index">
   
    <div class="card">
        <div class="card-header" data-background-color="purple">
            <div class="row">
                <div class="col-sm-9">
                    <h2 class="title"><?= Html::encode($this->title) ?></h2>
                </div>
                <div class="col-sm-3">
                    <?= Html::a('Create Company', ['create'], ['class' => 'btn btn-success btn-block']) ?>
                </div>
            </div>
        </div>
        <div class="card-content table-responsive">
            <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
           <?php Pjax::begin(['id'=>'hello']); ?>    
            <?= GridView::widget([
                'id'=>'tabledatax',
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'options'=>['class'=>'table'],
                    'columns' => [
                      

                        'Company_id',
                        'Company_name',
                        'Company_email:email',
                        'Company_address',
                        'Company_profile',
                        // 'Company_created',
                        // 'Company_status',

                        ['class' => 'backend\grid\ActionColumn'],
                    ],

                ]); ?>
            <?php Pjax::end(); ?>
        </div>
    </div>
</div>
