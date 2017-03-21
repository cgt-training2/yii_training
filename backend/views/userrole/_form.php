<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-item-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-sm-6">
    <?= $form->field($model, 'name',['options'=>['tag' => 'div','class' => 'form-group label-floating'],'template' => '{label}{input}{error}{hint}'])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type',['options'=>['tag' => 'div','class' => 'form-group hidden label-floating'],'template' => '{label}{input}{error}{hint}'])->hiddenInput(['value'=>1])->label(false) ?>

    <?= $form->field($model, 'description',['options'=>['tag' => 'div','class' => 'form-group label-floating'],'template' => '{label}{input}{error}{hint}'])->textarea(['rows' => 6]) ?>

    <?php // $form->field($model, 'rule_name')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'data')->textInput() ?>

    <?php // $form->field($model, 'created_at')->textInput() ?>

    <?php // $form->field($model, 'updated_at')->textInput() ?>
    </div>
    <div class="col-sm-6">
        <h3>Permissions</h3>
        <?php $authItems = ArrayHelper::map($authItems,'name','name'); ?>
        <?= $form->field($authitemchilds, 'child')->checkboxList($authItems,['class' => 'checkbox taxonomy-menu-item','separator' => '<br>'])->label(false);?> 
    </div>
</div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
