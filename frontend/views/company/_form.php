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

    <?= $form->field($model, 'Company_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Company_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Company_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Company_profile')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'Company_created')->textInput() ?>

    <?= $form->field($model, 'Company_created')->widget(
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

    <?= $form->field($model, 'Company_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
