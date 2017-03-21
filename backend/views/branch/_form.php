<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Company;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Branch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="branch-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'company_fk_id')->textInput() ?>

    <?= $form->field($model, 'company_fk_id',['options'=>['tag' => 'div','class' => 'form-group label-floating'],'template' => '{label}{input}{error}{hint}'])->textInput()->dropDownList(ArrayHelper::map(company::find()->asArray()->all(), 'Company_id', 'Company_name'))->label('Select Company'); ?>

    <?= $form->field($model, 'branch_name',['options'=>['tag' => 'div','class' => 'form-group label-floating'],'template' => '{label}{input}{error}{hint}'])->textInput(['maxlength' => true]) ?>
<div class="row">
   <div class="col-md-6">
    <?= $form->field($model, 'branch_created',['options'=>['tag' => 'div','class' => 'form-group label-floating'],'template' => '{label}{input}{error}{hint}'])->widget(
            DatePicker::className(), [
                // inline too, not bad
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
    <div class="col-md-6">
    <?= $form->field($model, 'branch_status',['options'=>['tag' => 'div','class' => 'form-group label-floating'],'template' => '{label}{input}{error}{hint}'])->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => '']) ?>
    </div>
</div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
