<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Usefor */

$this->title = 'Update Usefor: ' . $model->usefor_id;
$this->params['breadcrumbs'][] = ['label' => 'Usefors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->usefor_id, 'url' => ['view', 'id' => $model->usefor_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usefor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
