<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CarStatus */

$this->title = 'สถานะ';
$this->params['breadcrumbs'][] = ['label' => 'สถานะการจอง', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-status-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
