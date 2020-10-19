<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use app\models\Car;
use app\models\Usefor;
use app\models\CarStatus;
use app\models\Departments;
use app\models\Rental;
use app\models\Person;
use app\models\PersonSearch;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RentalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ตารางเดินรถ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rental-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('เพิ่มตารางเดินรถ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'car_user',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->carUser->person_name;
                },
                // 'filter' => Html::activeDropDownList($searchModel, 'car_user', ArrayHelper::map(Person::find()->all(), 'user_id', 'person_name'), ['class' => 'form-control', 'prompt' => 'ทั้งหมด...'])
            ],
            // 'car_user',
            // 'car_room',
            [
                'attribute' => 'car_room',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->carRoom->car_name;
                },
                'filter' => Html::activeDropDownList($searchModel, 'car_room', ArrayHelper::map(Car::find()->all(), 'car_id', 'car_name'), ['class' => 'form-control', 'prompt' => 'ทั้งหมด...'])
            ],
            [
                'attribute' => 'car_start',
                'options' => ['style' => 'width:10%'],
				'format' => 'html',
                'value' => function($model) {
					$day = explode(" ", $model->car_start);
					return Rental::dateShortThai($day['0'])."<br> เวลา : ".substr($day['1'],0,-3);
				}	
            ],
            [
                'attribute' => 'car_end',
                'options' => ['style' => 'width:10%'],
				'format' => 'html',
                'value' => function($model) {
					$day = explode(" ", $model->car_end);
					return Rental::dateShortThai($day['0'])."<br> เวลา : ".substr($day['1'],0,-3);
				}	
            ],
            // 'car_start',
            // 'car_end',
            // 'car_usefor',
            [
                'attribute' => 'car_usefor',
                'format' => 'html',
                'value' => function ($model) {
                    return $model->carUsefor->usefor_name;
                },
                'filter' => Html::activeDropDownList($searchModel, 'car_usefor', ArrayHelper::map(Usefor::find()->all(), 'usefor_id', 'usefor_name'), ['class' => 'form-control', 'prompt' => 'ทั้งหมด...'])
            ],
            // 'departments_id',
            [
                'attribute' => 'departments_id',
                'format' => 'html',
                'value' => function ($model) {
                    return '<span class="badge" style="background-color:' . $model->departments->color . ';"><b>' . $model->departments->department_name . '</b></span>';
                },
                'filter' => Html::activeDropDownList($searchModel, 'departments_id', ArrayHelper::map(Departments::find()->all(), 'departments_id', 'department_name'), ['class' => 'form-control', 'prompt' => 'ทั้งหมด...'])
            ],
            //'car_user',
            //'car_tel',
            //'car_title',
            //'car_description:ntext',
            //'car_seate',
            //'car_cur_date',
            //'file',
            //'car_status',
            [
                'attribute' => 'car_status',
                'format' => 'html',
                'value' => function ($model) {
                    return '<span class="badge" style="background-color:' . $model->carStatus->car_statust_color . ';"><b>' . $model->carStatus->car_status_name . '</b></span>';
                },
                'filter' => Html::activeDropDownList($searchModel, 'car_status', ArrayHelper::map(CarStatus::find()->all(), 'car_status_id', 'car_status_name'), ['class' => 'form-control', 'prompt' => 'ทั้งหมด...'])
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'options' => ['style' => 'width:120px;'],
                'buttonOptions' => ['class' => 'btn btn-default'],
                'template' => '<div class="btn-group btn-group-sm text-center" role="group"> {view} {update} {delete} </div>'
            ],
            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>