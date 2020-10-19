<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Car;
use app\models\Usefor;

/* @var $this yii\web\View */
/* @var $model app\models\Rental */

$this->title = $model->carUsefor->usefor_name. ' รถ: '.$model->carRoom->car_name. ' เริ่ม: '. $model->car_start. ' ถึง: '. $model->car_end;
$this->params['breadcrumbs'][] = ['label' => 'ตารางเดินรถ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="rental-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->car_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->car_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= $this->render('_view', [
        'model' => $model,
    ]) ?>

</div>
