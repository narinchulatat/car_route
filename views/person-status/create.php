<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PersonStatus */

$this->title = 'Create Person Status';
$this->params['breadcrumbs'][] = ['label' => 'Person Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
