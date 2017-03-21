<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">
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
                        'username',
                        'auth_key',
                        'password_hash',
                        'password_reset_token',
                        'email:email',
                        'status',
                        'created_at',
                        'updated_at',
                    ],
                ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>