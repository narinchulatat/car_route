<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RentalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rental-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'car_id') ?>

    <?= $form->field($model, 'car_room') ?>

    <?= $form->field($model, 'car_start') ?>

    <?= $form->field($model, 'car_end') ?>

    <?= $form->field($model, 'car_usefor') ?>

    <?php // echo $form->field($model, 'departments_id') ?>

    <?php // echo $form->field($model, 'car_user') ?>

    <?php // echo $form->field($model, 'car_tel') ?>

    <?php // echo $form->field($model, 'car_title') ?>

    <?php // echo $form->field($model, 'car_description') ?>

    <?php // echo $form->field($model, 'car_seate') ?>

    <?php // echo $form->field($model, 'car_cur_date') ?>

    <?php // echo $form->field($model, 'file') ?>

    <?php // echo $form->field($model, 'car_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
