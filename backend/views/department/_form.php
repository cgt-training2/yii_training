<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Company;
use app\models\Branch;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Department */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="department-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'company_fk_id',['options'=>['tag' => 'div','class' => 'form-group label-floating'],'template' => '{label}{input}{error}{hint}'])->dropDownList(ArrayHelper::map(company::find()->asArray()->all(), 'Company_id', 'Company_name'),['prompt'=>'','onchange'=>'
        $.post( "'.Yii::$app->urlManager->createUrl('department/listsbranch?id=').'"+$(this).val(), function( data ) {
                  $( "#department-branch_fk_id" ).html( data );
                });'])->label('Select Company'); ?>


    <?php // $form->field($model, 'company_fk_id')->dropDownList(ArrayHelper::map(company::find()->asArray()->all(), 'Company_id', 'Company_name'),['prompt'=>'Choose...','onchange'=>'getBranchlist(this.value)']); ?>

    
    <?php // $form->field($model, 'company_fk_id')->textInput() ?>

    <?php echo $form->field($model, 'branch_fk_id',['options'=>['tag' => 'div','class' => 'form-group label-floating'],'template' => '{label}{input}{error}{hint}'])->dropDownList(ArrayHelper::map(branch::find()->asArray()->all(), 'branch_id', 'branch_name'),['prompt'=>''])->label('Select Branch') ?>

    <?= $form->field($model, 'department_name',['options'=>['tag' => 'div','class' => 'form-group label-floating'],'template' => '{label}{input}{error}{hint}'])->textInput(['maxlength' => true]) ?>
<div class="row">
   <div class="col-md-6">
    <?= $form->field($model, 'department_create',['options'=>['tag' => 'div','class' => 'form-group label-floating'],'template' => '{label}{input}{error}{hint}'])->widget(
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
    <?= $form->field($model, 'department_status',['options'=>['tag' => 'div','class' => 'form-group label-floating'],'template' => '{label}{input}{error}{hint}'])->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ]) ?>
    </div>
</div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script type="text/javascript">
    function getBranchlist(id){    
        alert('hi');
        $.post( <?= Yii::$app->urlManager->createUrl('department/listsbranch?id=')?>id, function( data ) {
               $( "department-branch_fk_id" ).html( data );
             });
    }
</script>