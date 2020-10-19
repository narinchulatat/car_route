<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PersonStatus */

$this->title = $model->person_status_id;
$this->params['breadcrumbs'][] = ['label' => 'Person Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="person-status-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->person_status_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->person_status_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'person_status_id',
            'person_status_name',
            // 'person_statust_color',
            [
                'attribute' => 'person_statust_color',
                'format' => 'html',
                'value' => function ($model) {
                    return '<span class="badge" style="background-color:' . $model->person_statust_color . ';"><b>' . $model->person_statust_color . '</b></span>';
                    //return '<p class="lable" style="color:' . $model->status->color  . ';">' . $model->status->status_name . '</p>';
                },
            ],
        ],
    ]) ?>

</div>
