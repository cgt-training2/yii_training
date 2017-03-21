<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Po */

$this->title = 'Update Po: ' . $model->po_no;
$this->params['breadcrumbs'][] = ['label' => 'Pos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->po_no, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="po-update">
    <?= $this->render('_form', [
        'model' => $model,
        'modelsPoItem' => $modelsPoItem,
    ]) ?>

</div>
