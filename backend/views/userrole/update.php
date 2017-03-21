<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthItem */

$this->title = 'Update Auth Item: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Auth Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="auth-item-update">
	<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title"><?= Html::encode($this->title) ?></h4>
					<p class="category">Update the following fields to role:</p>
                </div>
    			<div class="card-content">
				    <?= $this->render('_form', [
				        'model' => $model,
				        'authItems'=> $authItems,
				        'authitemchilds' => $authitemchilds,
				    ]) ?>
				</div>
			</div>
		</div>
	</div>
</div>
