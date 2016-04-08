<?php
use yii\helpers\Html;

?>
<div class="col-sm-3">
    <div class="alert alert-info">
        <h5> <?= Html::a($model->name, ['/products/index', 'id' => $model->id]); ?></h5>
        <hr/>
        <?php if ($model->quantity > 0): ?>
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span>', ['/cart/add', 'id' => $model->id], ['class' => 'btn btn-primary btn-lg pull-left']) ?>
        <?php endif; ?>
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
</div>