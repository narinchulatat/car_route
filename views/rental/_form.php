<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
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
//
use yii\web\UploadedFile;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Rental */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary box-solid">
    <div class="box-header">
        <div class="box-title"> ตารางเดินรถ<small> </small></div>
    </div>
    <div class="box-body">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <div class="col-md-6">
            <div class="form-group">
                <?=
                    $form->field($model, 'car_room')->dropDownList(ArrayHelper::map(Car::find()->all(), 'car_id', 'car_name'), [
                        'prompt' => 'กรุณาเลือก ...',
                    ])
                ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <?=
                    $form->field($model, 'car_usefor')->dropDownList(ArrayHelper::map(Usefor::find()->all(), 'usefor_id', 'usefor_name'), [
                    ])
                ?>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <?=
                    $form->field($model, 'car_start')->widget(DateTimePicker::className(), [
                        'name' => 'car_start',
                        'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
                        'layout' => '{picker}{input}{remove}',
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
                        'layout' => '{picker}{input}{remove}',
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
                <?=
                    $form->field($model, 'departments_id')->dropDownList(ArrayHelper::map(Departments::find()->all(), 'departments_id', 'department_name'), [
                        'prompt' => 'กรุณาเลือก ...',
                    ])
                ?>
            </div>
        </div>
        <!-- <div class="col-md-4">
            <div class="form-group">
                <?= $form->field($model, 'car_user')->textInput(['maxlength' => true]) ?>
            </div>
        </div> -->
        <div class="col-md-4">
            <div class="form-group">
                <?=
                    $form->field($model, 'car_user')->dropDownList(ArrayHelper::map(Person::find()->all(), 'user_id', 'person_name'), [
                        'prompt' => 'กรุณาเลือก ...',
                    ])
                ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <?= $form->field($model, 'car_tel')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <?= $form->field($model, 'car_title')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <?= $form->field($model, 'car_description')->textarea(['rows' => 6]) ?>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <?= $form->field($model, 'car_seate')->textInput() ?>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <?=
                    $form->field($model, 'file')->widget(FileInput::classname(), [
                        'options' => [
                        ],
                        'pluginOptions' => [
                            'initialPreview' => [],
                            'language' => 'th',
                            'allowedFileExtensions' => ['pdf'],
                            'showPreview' => true,
                            'showRemove' => true,
                            'showUpload' => false,
                        ]
                    ]);
                ?>
            </div>
        </div>
    </div>
    <div class="box-footer with-border">
        <div class="col-md-12">
            <div class="form-group">
                <p> <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?></p>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>

