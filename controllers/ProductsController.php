<?php

namespace app\controllers;
use app\components\MyController;
use Yii;
use app\models\Products;
use yii\web\HttpException;

class ProductsController extends MyController
{
//    public function actionView($id)
//    {
//
//    }
    public function actionIndex($id)
    {
        $model = $this->loadModel($id);
        return $this->render('index',['model'=>$model]);

    }
    private function loadModel($id)
    {
        $model = Products::findOne(['id'=>$id,'confrimed'=>1]);
        if(!$model || !$model->category->confrimed)
        {
            throw new HttpException (404,'محصول مورد نظر یافت نشد.');
        }
        return $model;
    }

}
