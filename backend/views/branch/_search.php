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
    <?= $form->field($model, 'branch_name',['options'=>['tag' => 'div','class' => 'form-group label-floating'],'template' => '{label}{input}{error}{hint}'])->textInput(['autocomplete' => 'off','id'=>'searbarsearch'])->label('Search Branch Name') ?>
   <?php ActiveForm::end(); ?>

</div>
