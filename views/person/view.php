<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use slavkovrn\prettyphoto\PrettyPhotoWidget;

/* @var $this yii\web\View */
/* @var $model app\models\Person */

$this->title = $model->person_name;
$this->params['breadcrumbs'][] = ['label' => 'พนักงานขับรถ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="person-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->user_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= $this->render('_view', [
        'model' => $model,
    ]) ?>

</div>