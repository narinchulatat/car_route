<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\meeting\models\Setting */

$this->title = 'NY | จองห้องประชุม';
?>
<div class="setting-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
