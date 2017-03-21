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

    <?= $form->field($model, 'Company_name',['options'=>['tag' => 'div','class' => 'form-group label-floating'],'template' => '{label}{input}{error}{hint}'])->textInput(['autocomplete' => 'off','id'=>'searbarsearch'])->label("Search") ?>

    <?php  ActiveForm::end(); ?>

</div>
