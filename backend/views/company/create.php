<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Company */

$this->title = 'Create Company';
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['/company']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-create">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title"><?= Html::encode($this->title) ?></h4>
					<p class="category">Please fill out the following fields to company:</p>
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
<?php //$this->registerJsFile('@web/js/material.min.js');
?>
