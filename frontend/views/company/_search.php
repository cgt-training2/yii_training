<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CompanySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-search">

    <?php $form = ActiveForm::begin([
        'action' => ['searchaj'],
        'method' => 'get',
    ]); ?>

   
    <?php // $form->field($model, 'Company_id') ?>

    <?= $form->field($model, 'Company_name')->label("Search") ?>

    <?php // $form->field($model, 'Company_email') ?>

    <?php // $form->field($model, 'Company_address') ?>

    <?php // $form->field($model, 'Company_profile') ?>

    <?php // echo $form->field($model, 'Company_created') ?>

    <?php // echo $form->field($model, 'Company_status') ?>

    <div class="form-group">
        <?php // Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php // Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php  ActiveForm::end(); ?>

</div>
