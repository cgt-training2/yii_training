<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DepartmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Departments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-index">
    <div class="card">
        <div class="card-header" data-background-color="purple">
            <div class="row">
                <div class="col-sm-9">
                    <h2 class="title"><?= Html::encode($this->title) ?></h2>
                </div>
                <div class="col-sm-3">
                    <?= Html::a('Create Department', ['create'], ['class' => 'btn btn-success btn-block']) ?>
                </div>
            </div>
        </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <div class="card-content table-responsive">
            <?php Pjax::begin(); ?>    <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'department_id',
                    [
                     'attribute'=>'company_fk_id',
                    'value'=>'companyFk.Company_name',
                    'label'=>'Company Name'
                    ],
                    [
                     'attribute'=>'branch_fk_id',
                    'value'=>'branchFk.branch_name',
                    'label'=>'Branch Name'
                    ],
                    
                    'department_name',
                    'department_create',
                    // 'department_status',

                    ['class' => 'backend\grid\ActionColumn'],
                ],
            ]); ?>
            <?php Pjax::end(); ?>
        </div>
    </div>
</div>