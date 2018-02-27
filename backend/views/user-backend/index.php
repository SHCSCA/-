<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserBackendSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Backends';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-backend-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加管理员', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'auth_key',
            'password_hash',
            'email:email',
            // 'created_at',
            // 'updated_at',

            [
                'header' => '操作',
                'headerOptions' => ['width' => '150'],
                'class' => 'yii\grid\ActionColumn',
                'template'=> '{view} {delete} {favor}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a(Html::tag('span', '查看', ['class' => "glyphicon fa"]), ['user-backend/view',
                            'id'=>$model->id], ['class' => "btn btn-xs btn-success"]);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a(Html::tag('span', '删除', ['class' => "glyphicon fa"]), ['user-backend/delete',
                            'id'=>$model->id], ['class' => "btn btn-xs btn-default",'data-confirm' => '您确定要删除吗']);
                    },
                     'favor' => function ($url, $model, $key) {
//        return Html::a(Html::tag('span', '权限赋予', ['class' => "glyphicon glyphicon-user"]), ['rbac/list',
//            'id'=>$model->id], ['class' => "btn btn-xs btn-default"]);

                     return Html::a('权限赋予','index.php?r=rbac/list&id='.$model->id,[
                             'id' => 'create',
                             'data-toggle' => 'modal',
                             'data-target' => '#create-modal',
                             'class' => 'glyphicon glyphicon-user',
                         ]);
    }
                ]
            ],
        ],
    ]); ?>
</div>
<?php
    Modal::begin([
    'id' => 'create-modal',
    'header' => '<h4 class="modal-title">权限赋予</h4>',
    'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">关闭</a>',
    ]);
    Modal::end();
    //给按钮添加点击事件
    $requestUrl = Url::toRoute('rbac/list');
    $js = <<<JS
        $(document).on('click', '#create', function () {
            $.get('{$requestUrl}', {},
                function (data) {
                    $('.modal-body').html(data);
                }  
            );
        });
JS;
    $this->registerJs($js);
?>

