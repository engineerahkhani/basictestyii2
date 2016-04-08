<?php

namespace app\controllers;

use app\components\MyController;
use app\models\Categoreis;
use yii\data\Pagination;
use yii\web\HttpException;


class CategoreisController extends MyController
{
    public function actionIndex()
    {
        $query = Categoreis::find()->where(['confrimed'=>1]);
        $pagination = new Pagination([
            'defaultPageSize' => 2,
            'totalCount'=>$query->count(),
        ]);
        $modes = $query->orderBy('name')
            ->limit($pagination->limit)
            ->offset($pagination->offset)
            ->all();
        return $this->render('index',['models'=>$modes,'pagination'=>$pagination]);
    }

    public function actionView($id)
    {
        $model = $this->loadModel($id);
        return $this->render('view',['model'=>$model]);
    }

    private function loadModel($id)
    {
        if(!$model = Categoreis::findOne(['id'=>$id,'confrimed'=>1]))
        {
            throw new HttpException(404,"دسته بندی مورد نظر یافت نشد.");
        }
        return $model;
    }

}
