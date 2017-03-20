<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php //$form = ActiveForm::begin(['action'=>'index.php?r=site/savex']);
$form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->label('Full Name') ?>

    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'mobileno')->label('Mobile No') ?>
   
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>