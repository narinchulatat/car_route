<?php

use yii\helpers\Html;
use yii\grid\GridView;
use slavkovrn\prettyphoto\PrettyPhotoWidget;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Car', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <div class="box box-primary box-solid">
        <div class="box-header">
            <div class="box-title"><?= $this->title ?></div>
        </div>
        <div class="box-body">
            <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute' => 'car_img',
                            'format' => 'html',
                            'value' => function ($model) {
                                return PrettyPhotoWidget::widget([
                                    'id' => $model->car_img, // id of plugin should be unique at page
                                    'class' => 'img-thumbnail', // class of plugin to define a style
                                    'width' => '100px',
                                    //'height' => '100px', 
                                    'images' => [
                                        1 => [
                                            'src' => $model->photoViewer,
                                        ],
                                    ]
                                ]);
                            }, 'filter' => FALSE,
                        ],
                        'car_name',
                        'car_seate',
                        // ['class' => 'yii\grid\ActionColumn'],
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'buttonOptions' => ['class' => 'btn btn-default'],
                            'template' => '<div class="btn-group btn-group-sm text-center" role="group"> {view} {update} {delete} </div>'
                        ],
                    ],
                ]); ?>
        </div>
    </div>
</div>