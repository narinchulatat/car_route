<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rental */

$this->title = 'เพิ่มตารางเดินรถ';
$this->params['breadcrumbs'][] = ['label' => 'ตารางเดินรถ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rental-create">
<p><?= Html::a('<i class="fa fa-reply"></i> ย้อนกลับ', ['/rental'], ['class' => 'btn btn-info']) ?> </p>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
