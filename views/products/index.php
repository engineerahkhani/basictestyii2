<?php
/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = Html::encode($model->name);
$this->params['breadcrumbs'] = [
    ['label' => 'دسته بندی ها', 'url' => ['/categoreis/index']],
    ['label' => $model->category->name, 'url' => ['/categoreis/view', 'id' => $model->category_id]],
    $this->title,
];
?>
<div class="well">
    <?php
    if(file_exists(Yii::$app->basePath.'/web/photos/products/'.$model->id.'.jpg')){
        $fileName = Yii::$app->homeUrl.'/photos/products/'.$model->id.'.jpg';
    }else {
        $fileName = Yii::$app->homeUrl.'/images/no-image.jpg';
    }
    ?>
    <p>
        <img  alt="<?= Html::encode($model->name); ?>" class="img-thumbnail img-responsive" src="<?= $fileName ?>"/>
    </p>
    <h4>
        <?= Html::encode($model->name) ?>
    </h4>
    <?php if ($model->quantity > 0 && !Yii::$app->user->isGuest) :  ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus">|افزودن به سبد خرید</span>', ['/cart/add', 'id' => $model->id], ['class' => 'btn btn-primary btn-lg pull-left']) ?>
    <?php endif; ?>
    <hr/>
    <h6 class="text-muted">
        <?= Html::encode($model->category->name) ?>
    </h6>

    <p>
        <strong>
            قیمت:
        </strong>
        <label class="label <?= ($model->quantity > 0 ? 'label-success' : 'danger') ?>">
            <?= Html::encode($model->price); ?>

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
        <label class="label <?= ($model->quantity > 0 ? 'label-success' : 'danger') ?>">
            <?= Html::encode($model->quantity); ?>
        </label>
    </p>

</div>