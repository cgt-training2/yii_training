<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Company */

$this->title = 'Update Company: ' . $model->Company_name;
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Company_name, 'url' => ['view', 'id' => $model->Company_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="company-update">
	<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title"><?= Html::encode($this->title) ?></h4>
					<p class="category">Update the following fields to company:</p>
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
