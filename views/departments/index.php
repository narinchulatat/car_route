<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DepartmentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Departments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departments-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Departments', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'departments_id',
            'department_name',
            // 'color',
            [
                'attribute' => 'color',
                'format' => 'html',
                'value' => function ($model) {
                    return '<span class="badge" style="background-color:' . $model->color . ';"><b>' . $model->color . '</b></span>';
                    //return '<p class="lable" style="color:' . $model->status->color  . ';">' . $model->status->status_name . '</p>';
                },
                // 'filter' => Html::activeDropDownList($searchModel, 'color', ArrayHelper::map(CarStatus::find()->all(), 'car_status_id', 'color'), ['class' => 'form-control', 'prompt' => 'ทั้งหมด...'])
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
