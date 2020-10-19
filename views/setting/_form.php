<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\meeting\models\Setting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setting-form">

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="box box-info">
                <div class="box-header with-border">
                    <div class="box-tools pull-right">


                    </div>

                </div>
                <div class="box-body">
                    <!--<div class="col-md-1"></div> -->
                  

                        <?php $form = ActiveForm::begin(); ?>

                        <?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'linenotify')->textInput(['maxlength' => true]) ?>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="well text-center">
                                    <?= Html::img($model->getPhotoViewer(), ['style' => 'width:100px;', 'class' => 'img-rounded']); ?>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <?= $form->field($model, 'photo')->fileInput() ?>
                            </div>
                        </div>

                        <?= $form->field($model, 'note1')->textInput(['maxlength' => true]) ?>

                        <div class="form-group">
                            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    
                </div>
            </div>
        </div>
    </div>


</div>
