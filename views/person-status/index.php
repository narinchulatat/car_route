<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use app\models\PersonStatus;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonStatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Person Statuses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-status-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Person Status', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'person_status_id',
            'person_status_name',
            // 'person_statust_color',
            [
                'attribute' => 'person_statust_color',
                'format' => 'html',
                'value' => function ($model) {
                    return '<span class="badge" style="background-color:' . $model->person_statust_color . ';"><b>' . $model->person_statust_color . '</b></span>';
                    //return '<p class="lable" style="color:' . $model->status->color  . ';">' . $model->status->status_name . '</p>';
                },
                'filter' => Html::activeDropDownList($searchModel, 'person_statust_color', ArrayHelper::map(PersonStatus::find()->all(), 'person_status_id', 'person_statust_color'), ['class' => 'form-control', 'prompt' => 'ทั้งหมด...'])
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
