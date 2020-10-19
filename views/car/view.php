<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use slavkovrn\prettyphoto\PrettyPhotoWidget;

/* @var $this yii\web\View */
/* @var $model app\models\car */

$this->title = $model->car_name;
$this->params['breadcrumbs'][] = ['label' => 'Cars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="car-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->car_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->car_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="box box-success box-solid">
        <div class="box-header">
            <div class="box-title"><?= $this->title ?></div>
        </div>
        <div class="box-body">
            <div class="img-thumbnail">
                <?php
                echo PrettyPhotoWidget::widget([
                    'id' => $model->car_img, // id of plugin should be unique at page
                    'class' => 'galary', // class of plugin to define a style
                    'width' => '300px', // width of image visible in widget (omit - initial width)
                    //'height' => '180px',
                    'images' => [
                        1 => [
                            'src' => $model->photoViewer,
                            'title' => 'กดขยาย',
                        ],
                    ]
                ]);
                ?>
            </div>
            <hr>

            <?php
            echo
                DetailView::widget([
                    'model' => $model,
                    'template' => '<tr><th>{label}</th><td> {value}</td></tr>',
                    'attributes' => [
                        //'car_id',
                        'car_name',
                        'car_seate',
                        'car_size',
                        'car_description:ntext',
                        // 'car_img',
                    ],
                ])
            ?>
        </div>
    </div>

</div>