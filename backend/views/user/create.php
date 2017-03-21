<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = 'Create User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">
	<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title"><?= Html::encode($this->title) ?></h4>
					<p class="category">Please fill out the following fields to User:</p>
                </div>
                <div class="card-content">
    			    <?= $this->render('_form', [
				        'model' => $model,
                        'authItems' => $authItems,
				    ]) ?>
				</div>
            </div>
        </div>
    </div>
</div>
