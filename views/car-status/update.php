<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CarStatus */

$this->title = 'แก้ไขสถานะ: ' . $model->car_status_name;
$this->params['breadcrumbs'][] = ['label' => 'สถานะ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->car_status_name, 'url' => ['view', 'id' => $model->car_status_id]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="car-status-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
