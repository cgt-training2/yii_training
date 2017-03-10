<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BranchSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="branch-search">

    <?php $form = ActiveForm::begin([
        'action' => ['searchaj'],
        'method' => 'get',
    ]); ?>

    <?php //$form->field($model, 'branch_id') ?>

    <?php // $form->field($model, 'company_fk_id') ?>

    <?= $form->field($model, 'branch_name') ?>

    <?php // $form->field($model, 'branch_created') ?>

    <?php // $form->field($model, 'branch_status') ?>

    <div class="form-group">
        <?php // Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php // Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
