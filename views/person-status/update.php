<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PersonStatus */

$this->title = 'Update Person Status: ' . $model->person_status_id;
$this->params['breadcrumbs'][] = ['label' => 'Person Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->person_status_id, 'url' => ['view', 'id' => $model->person_status_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="person-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
