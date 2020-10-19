<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\color\ColorInput;

/* @var $this yii\web\View */
/* @var $model app\models\Departments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="departments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'department_name')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?> -->
    <?= $form->field($model, 'color')->widget(ColorInput::classname(), ['options' => ['placeholder' => 'เลือกสี'],]); ?>  

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
