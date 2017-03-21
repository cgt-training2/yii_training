<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Branch */

$this->title = 'Update Branch: ' . $model->branch_name;
$this->params['breadcrumbs'][] = ['label' => 'Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->branch_name, 'url' => ['view', 'id' => $model->branch_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="branch-update">
	<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title"><?= Html::encode($this->title) ?></h4>
					<p class="category">Update the following fields to branch:</p>
                </div>
                <div class="card-content">
				    <?= $this->render('_form', [
				        'model' => $model,
				    ]) ?>
				</div>
            </div>
        </div>
    </div>
</div>
