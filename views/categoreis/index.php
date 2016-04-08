    <?php
    use yii\helpers\Html;
    use app\models\Products;
    use yii\widgets\LinkPager;
    use yii\widgets\Pjax;

    $this->title = 'categories';
    $this->params['breadcrumbs'][] = $this->title;
    ?>

    <?php if(!$models): ?>
    <div class="alert alert-danger">
        <p>دسته بندی یافت نشد.</p>
    </div>
    <?php else: ?>
        <?php Pjax::begin(); ?>
        <?= LinkPager::widget(['pagination'=>$pagination]) ?>
    <ul class="list-group">
        <?php foreach($models as $model) : ?>
            <li class="list-group-item">
                <span class="label label-danger">
                    <?= Products::find()->where(['category_id'=>$model->id, 'confrimed' => 1])->count(); ?>
                </span>
                <?= Html::a($model->name,['view','id'=>$model->id],['class'=>'btn btn-link']) ?>
            </li>
        <?php endforeach; ?>
    </ul>
        <?php Pjax::end(); ?>
    <?php endif; ?>