<?php
use yii\grid\GridView;
use yii\widgets\Pjax;
?>
<?php  Pjax::begin(['id'=>'hello']); ?>    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'branch_id',
        [
         'attribute'=>'company_fk_id',
        'value'=>'companyFk.Company_name',
        'label'=>'Company Name'
        ],
        'branch_name',
        'branch_created',
        'branch_status',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>
<?php Pjax::end(); ?>
