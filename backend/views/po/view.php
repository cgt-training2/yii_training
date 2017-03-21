<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model frontend\models\Po */

$this->title = $model->po_no;
$this->params['breadcrumbs'][] = ['label' => 'Pos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="po-view">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="blue">
                    <div class="row">
                        <div class="col-sm-9">
                            <h4 class="title"><?= Html::encode($this->title) ?></h4>
                            <p class="category">Viewing complete detail of <?= Html::encode($this->title) ?>:</p>
                        </div>
                        <div class="col-sm-3">
                            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            'po_no',
                            'description',
                        ],
                    ]) ?>
                   <h2>Po Items</h2>
                    <?= GridView::widget([
                        'dataProvider' => $allitems,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'id',
                            'po_item_no',
                            'quantity',
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>

</div>
