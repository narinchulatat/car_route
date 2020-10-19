<?php

use yii\helpers\Url;
use app\models\PersonStatus;
use app\models\Person;
use yii\helpers\Html;
use yii\grid\GridView;
use slavkovrn\prettyphoto\PrettyPhotoWidget;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;
use kartik\icons\Icon;

Icon::map($this);

/* @var $this yii\web\View */

$this->title = 'CAR ROUTE';
?>
<div class="site-index">

    <!-- <div class="jumbotron">
        <h1>ปฏิทินเดินรถ</h1>
    </div> -->

    <div class="ui raised segment">
        <div class="row">
            <div class="col-md-12">
                <div class="ui one column grid">
                    <div class="column">
                        <a class="ui blue ribbon label">
                            <h4><i class="fas fa-ambulance"></i>&nbsp;สถานะพนักงานขับรถยนต์</h4>
                        </a>
                        <!-- <hr \> -->
                        <p></p>
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider2,
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
                                [
                                    'attribute' => 'start',
                                    'options' => ['style' => 'width:15%'],
                                    'format' => 'html',
                                    'value' => function ($model) {
                                        $day = explode(" ", $model->start);
                                        return Person::dateShortThai($day['0']) . " เวลา : " . substr($day['1'], 0, -3) . " น.";
                                    }
                                ],
                                [
                                    'attribute' => 'end',
                                    'options' => ['style' => 'width:15%'],
                                    'format' => 'html',
                                    'value' => function ($model) {
                                        $day = explode(" ", $model->end);
                                        return Person::dateShortThai($day['0']) . " เวลา : " . substr($day['1'], 0, -3) . " น.";
                                    }
                                ],
                                // 'start',
                                // 'end',
                                [
                                    'attribute' => 'person_status',
                                    'format' => 'html',
                                    'value' => function ($model) {
                                        return '<span class="badge" style="background-color:' . $model->personStatus->person_statust_color . ';"><b>' . $model->personStatus->person_status_name . '</b></span>';
                                    },
                                    'filter' => Html::activeDropDownList($searchModel, 'person_status', ArrayHelper::map(PersonStatus::find()->all(), 'person_status_id', 'person_status_name'), ['class' => 'form-control', 'prompt' => 'ทั้งหมด...'])
                                ],
                            ],
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ui raised segment">
        <div class="row">
            <div class="col-md-12">
                <div class="ui one column grid">
                    <div class="column">
                        <a class="ui teal ribbon label">
                            <h4><span class="fa fa-paper-plane"></span>&nbsp;ปฏิทินเดินรถ</h4>
                        </a>
                        <!-- <hr \> -->
                        <p></p>
                        <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
                            'events' => $events,
                            'options' => [
                                'lang' => 'th',
                            ],
                            'id' => 'calendar',
                            'clientOptions' => [
                                'editable' => false,
                                'draggable' => false,
                            ],
                            'eventClick' => "function(calEvent, jsEvent, view) {

                        $(this).css('border-color', 'red');

                        $.get('index.php?r=rental/viewcalendar',{'id':calEvent.id}, function(data){
                            $('.modal').modal('show')
                            .find('#modelContent')
                            .html(data);
                        })
                    }",
                        ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="body-content">
    </div>
</div>
<?php
Modal::begin([
    // 'header' => '<h4>Events</h4>',
    // 'id'     => 'modal',
    'size'   => 'modal-lg',
]);

echo "<div id='modelContent'></div>";
Modal::end();
?>