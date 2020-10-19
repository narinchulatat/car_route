<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use app\models\CarStatus;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CarStatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'สถานะ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-status-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่มสถานะ', ['create'], ['class' => 'btn btn-danger']) ?>
    </p>
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
                    //'car_status_id',
                    'car_status_name',
                    //'car_statust_color',
                    [
                        'attribute' => 'car_statust_color',
                        'format' => 'html',
                        'value' => function ($model) {
                            return '<span class="badge" style="background-color:' . $model->car_statust_color . ';"><b>' . $model->car_statust_color . '</b></span>';
                            //return '<p class="lable" style="color:' . $model->status->color  . ';">' . $model->status->status_name . '</p>';
                        },
                        'filter' => Html::activeDropDownList($searchModel, 'car_statust_color', ArrayHelper::map(CarStatus::find()->all(), 'car_status_id', 'car_statust_color'), ['class' => 'form-control', 'prompt' => 'ทั้งหมด...'])
                    ],
                    //['class' => 'yii\grid\ActionColumn'],
                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'options' => ['style' => 'width:120px;'],
                        'buttonOptions' => ['class' => 'btn btn-default'],
                        'template' => '<div class="btn-group btn-group-xs text-center" role="group"> {view} {update} {delete}</div>'
                    ],
                ],
            ]);
            ?>
        </div>
    </div>
</div>