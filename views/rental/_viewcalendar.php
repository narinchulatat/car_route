<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
// widget
use kartik\date\DatePicker; //เรียกใช้งาน widget datepicker ของ kartik
use kartik\widgets\DateTimePicker;
use kartik\checkbox\CheckboxX;
use kartik\form\ActiveForm;
use app\models\Car;
use app\models\Usefor;
use app\models\Departments;
use app\models\CarStatus;
use app\models\Person;
use slavkovrn\prettyphoto\PrettyPhotoWidget;

/* @var $this yii\web\View */
/* @var $model app\models\Booking */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="box-title"> ระบบตารางเดินรถ<small> </small></div>
    </div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <div class="img-thumbnail">
                        <?php
                        echo PrettyPhotoWidget::widget([
                            'id' => $model->carRoom->car_img,
                            'class' => 'galary',
                            'height' => '100px',
                            'images' => [
                                1 => [
                                    'src' => $model->carRoom->photoViewer,
                                    // 'title' => 'กดขยาย',
                                ],
                            ]
                        ]);
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <?=
                        $form->field($model, 'car_room')->dropDownList(ArrayHelper::map(Car::find()->all(), 'car_id', 'car_name'), [
                            'disabled' => true,
                        ])
                    ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <?=
                        $form->field($model, 'car_usefor')->dropDownList(ArrayHelper::map(Usefor::find()->all(), 'usefor_id', 'usefor_name'), [
                            'disabled' => true,
                        ])
                    ?>
                </div>
            </div>
        </div>
        <div class="row">

        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <?=
                        $form->field($model, 'car_start')->widget(DateTimePicker::className(), [
                            'name' => 'car_start',
                            'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
                            'layout' => '{picker}{input}{remove}',
                            'disabled' => true,
                            'pluginOptions' => [
                                'language' => 'th',
                                'todayHighlight' => true,
                                'autoclose' => true,
                                'format' => 'yyyy-m-d hh:ii'
                            ]
                        ]);
                    ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <?=
                        $form->field($model, 'car_end')->widget(DateTimePicker::className(), [
                            'name' => 'car_end',
                            'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
                            //'type' => DateTimePicker::TYPE_INLINE,
                            'layout' => '{picker}{input}{remove}',
                            'disabled' => true,
                            //'value' => '23-Feb-1982 10:10',
                            'pluginOptions' => [
                                'language' => 'th',
                                'todayHighlight' => true,
                                'autoclose' => true,
                                'format' => 'yyyy-m-d hh:ii'
                            ]
                        ]);
                    ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <?=
                        $form->field($model, 'departments_id')->dropDownList(ArrayHelper::map(Departments::find()->all(), 'departments_id', 'department_name'), [
                            'disabled' => true,
                        ])
                    ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <?=
                        $form->field($model, 'car_user')->dropDownList(ArrayHelper::map(Person::find()->all(), 'user_id', 'person_name'), [
                            'disabled' => true,
                        ])
                    ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <?= $form->field($model, 'car_tel')->textInput(['disabled' => true]) ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <?= $form->field($model, 'car_title')->textInput(['disabled' => true]) ?>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <?= $form->field($model, 'car_description')->textarea(['rows' => 3, 'disabled' => true]) ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <?= $form->field($model, 'car_seate')->textInput(['disabled' => true]) ?>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">

                    <?=
                        $form->field($model, 'car_cur_date')->widget(DateTimePicker::className(), [
                            'name' => 'car_end',
                            'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
                            //'type' => DateTimePicker::TYPE_INLINE,
                            'layout' => '{picker}{input}{remove}',
                            'disabled' => true,
                            //'value' => '23-Feb-1982 10:10',
                            'pluginOptions' => [
                                'language' => 'th',
                                'todayHighlight' => true,
                                'autoclose' => true,
                                'format' => 'yyyy-m-d hh:ii'
                            ]
                        ]);
                    ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <?php
                    echo $form->field($model, 'car_status')->dropDownList(ArrayHelper::map(CarStatus::find()->all(), 'car_status_id', 'car_status_name'), [
                        'disabled' => true,
                    ])
                    ?>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>