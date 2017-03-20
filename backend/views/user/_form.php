<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username',['options'=>['tag' => 'div','class' => 'form-group label-floating'],'template' => '{label}{input}{error}{hint}'])->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'email',['options'=>['tag' => 'div','class' => 'form-group label-floating'],'template' => '{label}{input}{error}{hint}']) ?>
    
    
    <?php // $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_hash',['options'=>['tag' => 'div','class' => 'form-group label-floating'],'template' => '{label}{input}{error}{hint}'])->textInput()->label('Password') ?>

     <?php 
        $authItems = ArrayHelper::map($authItems,'name','name');
            //$authItems = ArrayHelper::map(company::find()->asArray()->all(), 'Company_id', 'Company_name')
        $dataStatus =array('0' => 'Inactive', '10'=>'Active'); 
    ?>
   
    <?= $form->field($model, 'permission')->dropDownList($authItems)->label('User Roll'); ?>


    <?php // $form->field($model, 'status',['options'=>['tag' => 'div','class' => 'form-group label-floating'],'template' => '{label}{input}{error}{hint}'])->textInput() ?>


    <?= $form->field($model, 'status',['options'=>['tag' => 'div','class' => 'form-group label-floating'],'template' => '{label}{input}{error}{hint}'])->dropDownList($dataStatus); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
