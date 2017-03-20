<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Company */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
   <div class="col-md-6">
    <?= $form->field($model, 'Company_name',['options'=>['tag' => 'div','class' => 'form-group label-floating'],'template' => '{label}{input}{error}{hint}'])->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-6">
    <?= $form->field($model, 'Company_email',['options'=>['tag' => 'div','class' => 'form-group label-floating'],'template' => '{label}{input}{error}{hint}'])->textInput(['maxlength' => true]) ?>
    </div>
</div>
<div class="row">
   <div class="col-md-6">
    <?= $form->field($model, 'Company_address',['options'=>['tag' => 'div','class' => 'form-group label-floating'],'template' => '{label}{input}{error}{hint}'])->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-6">
    <?= $form->field($model, 'Company_profile',['options'=>['tag' => 'div','class' => 'form-group label-floating'],'template' => '{label}{input}{error}{hint}'])->textInput(['maxlength' => true]) ?>
    </div>
</div>
<div class="row">
   <div class="col-md-3">
    <?= $form->field($model, 'Company_created',['options'=>['tag' => 'div','class' => 'form-group label-floating'],'template' => '{label}{input}{error}{hint}'])->widget(
            DatePicker::className(), [
                 'inline' => true, 
                 // modify template for custom rendering
                'template' => '<div class="input-group date" data-provide="datepicker">{input}
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
        ]);
    ?>
    </div>
    <div class="col-md-3">
    <?= $form->field($model, 'Company_status',['options'=>['tag' => 'div','class' => 'form-group label-floating'],'template' => '{label}{input}{error}{hint}'])->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => '']) ?>
    </div>
</div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
