<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rental */

$this->title = 'แก้ไขตารางเดินรถ: ' . $model->car_id;
$this->params['breadcrumbs'][] = ['label' => 'ตารางเดินรถ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->car_id, 'url' => ['view', 'id' => $model->car_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rental-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
