<?php
namespace backend\controllers;
use backend\models\Item;
use Yii;
use yii\web\Controller;

/**
 * 权限控制器
 * Class RbacController
 * @package backend\controllers
 */
class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = \Yii::$app->authManager;
        $blogindex = $auth->createPermission('/blog/index');
        $blogindex->description = '博客列表';
        $auth->add($blogindex);

        $blogMange = $auth->createRole('博客管理');
        $auth->add($blogMange);
        $auth->addChild($blogMange,$blogindex);
        $auth->assign($blogMange,1);
    }


    public function actionList()
    {
        $model = new Item();
        $data = Item::find()->all();
        return $this->renderPartial('index', [
//            'searchModel' => $searchModel,
            'model' => $model,
            'data' =>$data,
        ]);
    }
}