<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\SemanticAsset;

// AppAsset::register($this);
SemanticAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/favicon.ico" type="image/x-icon" />
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>

    <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => Yii::$app->name,
            // 'brandLabel' => '<img src="images/moph.png" style="display:inline; vertical-align: top; height:32px;" class="img-responsive"> โรงพยาบาลน้ำยืน',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav'],
            'encodeLabels' => false,
            'items' => [
                ['label' => '<i class="glyphicon glyphicon-home"></i> หน้าแรก', 'url' => ['/site/index']],
                ['label' => '<i class="glyphicon glyphicon-info-sign"></i> เกี่ยวกับ', 'url' => ['/site/about']],
                ['label' => '<i class="glyphicon glyphicon-envelope"></i> ติดต่อ', 'url' => ['/site/contact']],
            ],
        ]);

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'encodeLabels' => false,
            'items' => [
                ['label' => '<i class="glyphicon glyphicon-road"></i> พนักงานขับรถ', 'url' => ['/person/index'], 'visible' => !Yii::$app->user->isGuest],
                [
                    'label' => '<i class="glyphicon glyphicon-cog"></i> จัดการเว็บไซต์', 'visible' => !Yii::$app->user->isGuest,
                    'items' => [
                        // ['label' => '<i class="glyphicon glyphicon-menu-right"></i> พนักงานขับรถ', 'url' => ['/person/index'], 'visible' => !Yii::$app->user->isGuest],
                        ['label' => '<i class="glyphicon glyphicon-menu-right"></i> สถานะพนักงานขับรถ', 'url' => ['/person-status/index'], 'visible' => !Yii::$app->user->isGuest],
                        ['label' => '<i class="glyphicon glyphicon-menu-right"></i> สถานะ', 'url' => ['/car-status/index'], 'visible' => !Yii::$app->user->isGuest],
                        ['label' => '<i class="glyphicon glyphicon-menu-right"></i> รถยนต์', 'url' => ['/car/index'], 'visible' => !Yii::$app->user->isGuest],
                        ['label' => '<i class="glyphicon glyphicon-menu-right"></i> แผนก', 'url' => ['/departments/index'], 'visible' => !Yii::$app->user->isGuest],
                        ['label' => '<i class="glyphicon glyphicon-menu-right"></i> สถานะเดินรถ', 'url' => ['/usefor/index'], 'visible' => !Yii::$app->user->isGuest],
                        ['label' => '<i class="glyphicon glyphicon-menu-right"></i> ตารางเดินรถ', 'url' => ['/rental/index'], 'visible' => !Yii::$app->user->isGuest],
                        ['label' => '<i class="glyphicon glyphicon-menu-right"></i> ปฏิทินเดินรถ', 'url' => ['/rental/calendar'], 'visible' => !Yii::$app->user->isGuest],
                    ],
                ],
                Yii::$app->user->isGuest ?
                    ['label' => '<i class="glyphicon glyphicon-log-in"></i> เข้าสู่ระบบ', 'url' => ['/user/security/login']] : ['label' => 'ยินดีต้อนรับ (' . Yii::$app->user->identity->username . ')', 'items' => [
                        ['label' => '<i class="glyphicon glyphicon-menu-right"></i> โพรไฟล์', 'url' => ['/user/profile']],
                        //['label' => 'ตั้งค่าโพรไฟล์', 'url' => ['/user/settings/profile']],
                        ['label' => '<i class="glyphicon glyphicon-menu-right"></i> จัดการผู้ใช้', 'url' => ['/user/admin/index']],
                        ['label' => '<i class="glyphicon glyphicon-log-out"></i> ออกจากระบบ', 'url' => ['/user/security/logout'], 'linkOptions' => ['data-method' => 'post']],

                    ]],
                //['label' => 'สมัครสมาชิก', 'url' => ['/user/registration/register'], 'visible' => Yii::$app->user->isGuest],
            ],
        ]);
        NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; Copyright  <?= date('Y') ?> <a href="https://www.facebook.com/FREEDOOM.FINO/"> And Development By Narin Chulatat. All rights</a></p>

            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>