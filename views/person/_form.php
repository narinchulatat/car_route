<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use app\models\PersonStatus;
use yii\helpers\ArrayHelper;
use kartik\widgets\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Person */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="person-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <!-- <?= $form->field($model, 'user_img')->textInput(['maxlength' => true]) ?> -->

    <div class="col-md-6">
        <div class="form-group">
            <?= $form->field($model, 'person_name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <?= $form->field($model, 'tel')->textInput(['type' => 'number']) ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <?= $form->field($model, 'queue')->dropDownList(['คิวที่ 10' => 'คิวที่ 10', 'คิวที่ 9' => 'คิวที่ 9', 'คิวที่ 8' => 'คิวที่ 8', 'คิวที่ 7' => 'คิวที่ 7', 'คิวที่ 6' => 'คิวที่ 6', 'คิวที่ 5' => 'คิวที่ 5', 'คิวที่ 4' => 'คิวที่ 4', 'คิวที่ 3' => 'คิวที่ 3', 'คิวที่ 2' => 'คิวที่ 2', 'คิวที่ 1' => 'คิวที่ 1',], ['prompt' => '']) ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <?php
            echo $form->field($model, 'person_status')->dropDownList(ArrayHelper::map(PersonStatus::find()->all(), 'person_status_id', 'person_status_name'), [
                // 'prompt' => 'กรุณาเลือก ...',
            ])
            ?>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <?=
                $form->field($model, 'start')->widget(DateTimePicker::className(), [
                    'name' => 'start',
                    'options' => ['placeholder' => 'Select date ...'],
                    'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
                    'layout' => '{picker}{input}{remove}',
                    'pluginOptions' => [
                        'lang' => 'th-th',
                        'todayHighlight' => true,
                        'autoclose' => true,
                        'format' => 'yyyy-m-d hh:ii'
                    ]
                ]);
            ?>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <?=
                $form->field($model, 'end')->widget(DateTimePicker::className(), [
                    'name' => 'end',
                    'options' => ['placeholder' => 'Select date ...'],
                    'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
                    'layout' => '{picker}{input}{remove}',
                    'pluginOptions' => [
                        'lang' => 'th-th',
                        'todayHighlight' => true,
                        'autoclose' => true,
                        'format' => 'yyyy-m-d hh:ii'
                    ]
                ]);
            ?>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <?=
                $form->field($model, 'user_img')->widget(FileInput::classname(), [
                    'options' => [
                        'accept' => 'image/*',
                        //'multiple' => true
                    ],
                    'pluginOptions' => [
                        'initialPreview' => [],
                        'language' => 'th',
                        'allowedFileExtensions' => ['jpg', 'png', 'gif', 'pdf'],
                        'showPreview' => true,
                        'showRemove' => true,
                        'showUpload' => false
                    ]
                ]);
            ?>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>