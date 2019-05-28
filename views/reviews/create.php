<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model wdmg\reviews\models\Reviews */

$this->title = Yii::t('app/modules/reviews', 'Create Reviews');
$this->params['breadcrumbs'][] = ['label' => $this->context->module->name, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-header">
    <h1>
        <?= Html::encode($this->title) ?> <small class="text-muted pull-right">[v.<?= $this->context->module->version ?>]</small>
    </h1>
</div>
<div class="reviews-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

<?php echo $this->render('../_debug'); ?>
