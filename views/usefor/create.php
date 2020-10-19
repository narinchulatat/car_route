<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Usefor */

$this->title = 'Create Usefor';
$this->params['breadcrumbs'][] = ['label' => 'Usefors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usefor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
