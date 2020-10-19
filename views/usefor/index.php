<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UseforSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usefors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usefor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Usefor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'usefor_id',
            'usefor_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
