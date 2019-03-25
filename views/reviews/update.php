<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model wdmg\reviews\models\Reviews */

$this->title = Yii::t('app/modules/reviews', 'Update Reviews: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/modules/reviews', 'Reviews'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app/modules/reviews', 'Update');
?>
<div class="reviews-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
