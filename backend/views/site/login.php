<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
<br><br>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h1 class="title"><?= Html::encode($this->title) ?></h1>
                    <p class="category">Please fill out the following fields to login:</p>
                </div>
                <div class="card-content">
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                    
                    <?= $form->field($model, 'username',['options'=>['tag' => 'div','class' => 'form-group label-floating'],'template' => '{label}{input}{error}{hint}'])->textInput(['autofocus' => true , 'autocomplete' => 'off'])?>

                    <?= $form->field($model, 'password',['options'=>['tag' => 'div','class' => 'form-group label-floating'],'template' => '{label}{input}{error}{hint}'])->passwordInput(['autocomplete' => 'off']) ?>

                    <?= $form->field($model, 'rememberMe')->checkbox() ?>

                    <div class="form-group">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
