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
            <div class="col-sm-3">
                <div class="alert alert-info">
                    <h5> <?= Html::a($product->name,['/products/view','id'=>$product->id]); ?></h5>
                    <hr/>
                    <?php if($product->quantity > 0): ?>
                <?= Html::a('<span class="glyphicon glyphicon-plus"></span>',['/cart/add','id'=>$product->id], ['class'=>'btn btn-primary btn-lg pull-left']) ?>
                <?php endif; ?>
                    <p>
                        <strong>
                        قیمت:
                        </strong>
                        <label class="label <?= ($product->quantity >0 ?'label-success':'danger') ?>">
                            <?= Html::encode($product->price); ?>

                        <strong>
                            &nbsp;
                           تومان
                        </strong>
                        </label>
                    </p>
                    <br>
                    <p>
                        <strong>
                       موجودی:
                        </strong>
                        <label class="label <?= ($product->quantity >0 ?'label-success':'danger') ?>">
                            <?= Html::encode($product->quantity); ?>
                        </label>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php
endif;
