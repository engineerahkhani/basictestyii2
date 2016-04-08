<?php
use yii\helpers\Html;
use app\models\Products;

$this->title = Html::encode($model->name);

$this->params['breadcrumbs'] = [
    ['label' => 'دسته بندی ها', 'url' => ['index']],
    ['label' => $this->title]
];
$products = Products::find()->where(['category_id' => $model->id, 'confrimed' => 1])->all(); ?>
<?php if (!$products): ?>
    <div class="alert alert-danger">
        <p>محصولی یافت نشد.</p>
    </div>
<?php else: ?>
    <div class="row">

        <?php foreach ($products as $product): ?>
<?= $this->render('/products/_view',['model'=>$product]) ?>
        <?php endforeach; ?>
    </div>
    <?php
endif;
