<?php

use app\models\PersonStatus;
use yii\helpers\Html;
use yii\grid\GridView;
use slavkovrn\prettyphoto\PrettyPhotoWidget;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'พนักงานขับรถ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('เพิ่มพนักงานขับรถ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'user_id',
            // 'user_img',
            [
                'attribute' => 'user_img',
                'format' => 'html',
                'value' => function ($model) {
                    return PrettyPhotoWidget::widget([
                        'id' => $model->user_img, // id of plugin should be unique at page
                        'class' => 'img-thumbnail', // class of plugin to define a style
                        'width' => '45px',
                        //'height' => '100px', 
                        'images' => [
                            1 => [
                                'src' => $model->photoViewer,
                            ],
                        ]
                    ]);
                }, 'filter' => FALSE,
            ],
            'person_name',
            'tel',
            'code',
            'queue',
            'start',
            'end',
            [
                'attribute' => 'person_status',
                'format' => 'html',
                'value' => function ($model) {
                    return '<span class="badge" style="background-color:' . $model->personStatus->person_statust_color . ';"><b>' . $model->personStatus->person_status_name . '</b></span>';
                },
                'filter' => Html::activeDropDownList($searchModel, 'person_status', ArrayHelper::map(PersonStatus::find()->all(), 'person_status_id', 'person_status_name'), ['class' => 'form-control', 'prompt' => 'ทั้งหมด...'])
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'คลิกดู',
                'headerOptions' => ['style' => 'width:15%'],
                'template' => '<div class="btn-group btn-group-sm text-center" role="group"> {detail} {edit} {del} </div>',
                'buttons' => [
                    'detail' => function ($url, $model, $key) {
                        return Html::a(
                            'รายละเอียด',
                            ['view', 'id' => $model->user_id],
                            ['class' => 'btn btn-inverse'],
                            $url
                        );
                    },
                    'edit' => function ($url, $model, $key) {
                        return Html::a(
                            'ปรับปรุง',
                            ['update', 'id' => $model->user_id],
                            ['class' => 'btn btn-success'],
                            $url
                        );
                    },
                    // 'del' => function($url,$model,$key){
                    //     return Html::a('ลบ',
                    //         ['delete', 'id' => $model->id],
                    //         ['class' => 'btn btn-danger'],
                    //         $url);
                    // },
                ],
            ],
            // [
            //     'class' => 'yii\grid\ActionColumn',
            //     'options' => ['style' => 'width:120px;'],
            //     'buttonOptions' => ['class' => 'btn btn-default'],
            //     'template' => '<div class="btn-group btn-group-sm text-center" role="group"> {update} </div>'
            // ],
        ],
    ]); ?>


</div>