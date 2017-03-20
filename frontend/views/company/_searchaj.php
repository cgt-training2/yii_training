<?php
use yii\grid\GridView;
use yii\widgets\Pjax;
?>
<?php Pjax::begin(); ?>    
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Company_id',
            'Company_name',
            'Company_email:email',
            'Company_address',
            'Company_profile',
            // 'Company_created',
            // 'Company_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
