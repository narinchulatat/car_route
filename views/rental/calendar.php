<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;
use yii\helpers\Url;

use yii2fullcalendar\yii2fullcalendar;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ปฏิทินเดินรถ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]);  
    ?>
    <p>
        <?= Html::a('เพิ่มปฏิทินเดินรถ', ['create'], ['class' => 'btn btn-danger']) ?>
    </p>

    <div class="row">
        <div class="col-md-12">
            <div class="ui one column grid">
                <div class="column">
                    <h4><span class="fa fa-paper-plane"></span>&nbsp;ปฏิทินเดินรถ</h4>
                    <hr \>
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

<?php
Modal::begin([
    // 'header' => '<h4>Events</h4>',
    // 'id'     => 'modal',
    'size'   => 'modal-lg',
]);

echo "<div id='modelContent'></div>";
Modal::end();
?>