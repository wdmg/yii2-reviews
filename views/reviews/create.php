<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model wdmg\reviews\models\Reviews */

$this->title = Yii::t('app/modules/reviews', 'Create Reviews');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/modules/reviews', 'Reviews'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reviews-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
