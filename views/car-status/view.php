<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CarStatus */

$this->title = $model->car_status_name;
$this->params['breadcrumbs'][] = ['label' => 'สถานะ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Car-status-view">
    <p>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->car_status_id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('ลบ', ['delete', 'id' => $model->car_status_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>
    <div class="box box-primary box-solid">
        <div class="box-header">
            <div class="box-title"><?= $this->title ?></div>
        </div>
        <div class="box-body"> 
            <?=
            DetailView::widget([
                'model' => $model,
                'attributes' => [
                    // 'car_status_id',
                    'car_status_name',
                    //'car_statust_color',
                    [
                        'attribute' => 'car_statust_color',
                        'format' => 'html',
                        'value' => function ($model) {
                            return '<span class="badge" style="background-color:' . $model->car_statust_color . ';"><b>' . $model->car_statust_color . '</b></span>';
                            //return '<p class="lable" style="color:' . $model->status->color  . ';">' . $model->status->status_name . '</p>';
                        },
                    ],
                ],
            ])
            ?>

        </div>
    </div>
</div>
