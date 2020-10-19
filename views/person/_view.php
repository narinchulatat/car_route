<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\form\ActiveForm;
use app\models\PersonStatus;
use slavkovrn\prettyphoto\PrettyPhotoWidget;

/* @var $this yii\web\View */
/* @var $model app\models\Person */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>

<div class="col-md-6">
    <div class="form-group">
        <?= $form->field($model, 'person_name')->textInput(['disabled' => true]) ?>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <?= $form->field($model, 'tel')->textInput(['disabled' => true]) ?>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <?= $form->field($model, 'code')->textInput(['disabled' => true]) ?>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <?= $form->field($model, 'queue')->textInput(['disabled' => true]) ?>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <?php
        echo $form->field($model, 'person_status')->dropDownList(ArrayHelper::map(PersonStatus::find()->all(), 'person_status_id', 'person_status_name'), [
            'disabled' => true,
        ])
        ?>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <div class="img-thumbnail">
            <?php
            echo PrettyPhotoWidget::widget([
                'id' => $model->user_img, // id of plugin should be unique at page
                'class' => 'galary', // class of plugin to define a style
                'width' => '300px', // width of image visible in widget (omit - initial width)
                //'height' => '180px',
                'images' => [
                    1 => [
                        'src' => $model->photoViewer,
                        'title' => 'กดขยาย',
                    ],
                ]
            ]);
            ?>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>