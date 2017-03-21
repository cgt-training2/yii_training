<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Company */

$this->title = $model->Company_name;
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-view">
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
                            <?= Html::a('Update', ['update', 'id' => $model->Company_id], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Delete', ['delete', 'id' => $model->Company_id], [
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
                            'Company_id',
                            'Company_name',
                            'Company_email:email',
                            'Company_address',
                            'Company_profile',
                            'Company_created',
                            'Company_status',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>

</div>
