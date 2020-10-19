<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Person */

$this->title = 'แก้ไขพนักงานขับรถ: ' . $model->person_name;
$this->params['breadcrumbs'][] = ['label' => 'พนักงานขับรถ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->person_name, 'url' => ['view', 'id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="person-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
