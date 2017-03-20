<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Branch */

$this->title = 'Create Branch';
$this->params['breadcrumbs'][] = ['label' => 'Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branch-create">
	<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title"><?= Html::encode($this->title) ?></h4>
					<p class="category">Please fill out the following fields to branch:</p>
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
