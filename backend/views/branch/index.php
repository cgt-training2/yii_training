<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BranchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Branches';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branch-index">
    <div class="card">
        <div class="card-header" data-background-color="purple">
            <div class="row">
                <div class="col-sm-9">
                    <h2 class="title"><?= Html::encode($this->title) ?></h2>
                </div>
                <div class="col-sm-3">
                    <?= Html::a('Create Branch', ['create'], ['class' => 'btn btn-success btn-block']) ?>
                </div>
            </div>
        </div>
        <div class="card-content table-responsive">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
            <?php  Pjax::begin(['id'=>'hello']); ?>    <?= GridView::widget([
                'dataProvider' => $dataProvider,
               // 'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'branch_id',
                    [
                     'attribute'=>'company_fk_id',
                    'value'=>'companyFk.Company_name',
                    'label'=>'Company Name'
                    ],
                    'branch_name',
                    'branch_created',
                    'branch_status',

                    ['class' => 'backend\grid\ActionColumn'],
                ],
            ]); ?>
            <?php Pjax::end(); ?>
        </div>
    </div>
</div>
