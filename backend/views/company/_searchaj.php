<?php
use backend\grid\GridView;
use yii\widgets\Pjax;
?>
    <?php Pjax::begin(); ?>    
    <?= GridView::widget([
            'id'=>'tabledatax',
            'dataProvider' => $dataProvider,
            // 'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'Company_id',
                'Company_name',
                'Company_email:email',
                'Company_address',
                'Company_profile',
                // 'Company_created',
                // 'Company_status',

                ['class' => 'backend\grid\ActionColumn'],
            ],
        ]); ?>
    <?php Pjax::end(); ?>
    

<script src="/yii_pawan1/admin/assets/b521587c/yii.js"></script>
<script src="/yii_pawan1/admin/assets/b521587c/yii.gridView.js"></script>
<script type="text/javascript">jQuery('#tabledatax').yiiGridView({"filterUrl":'<?= Yii::$app->request->url;  ?>',"filterSelector":"#tabledatax-filters input, #tabledatax-filters select, #seleectform select"});</script>