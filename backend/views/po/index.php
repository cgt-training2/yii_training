<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="po-index">
    <div class="card">
        <div class="card-header" data-background-color="purple">
            <div class="row">
                <div class="col-sm-9">
                    <h2 class="title"><?= Html::encode($this->title) ?></h2>
                </div>
                <div class="col-sm-3">
                    <?= Html::a('Create Po', ['create'], ['class' => 'btn btn-success btn-block']) ?>
                </div>
            </div>
        </div>
       <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
       <div class="card-content table-responsive">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    //['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute' => 'id',
                            'filterInputOptions' => [
                                'class'       => 'form-control',
                                'placeholder' => 'id'
                             ]
                        ],
                        [
                            'attribute' => 'po_no',
                            'filterInputOptions' => [
                                'class'       => 'form-control',
                                'placeholder' => 'po_no'
                             ],
                        ],                    
                        [
                            'attribute' => 'description',
                            'filterInputOptions' => [
                                'class'       => 'form-control',
                                'placeholder' => 'description'
                             ],
                        ],                    

                    ['class' => 'backend\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
