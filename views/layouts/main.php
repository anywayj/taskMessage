<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use app\assets\FrontendAsset;

FrontendAsset::register($this);

?>
<? $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <? $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <? $this->head() ?>
</head>
<body>
<?  $this->beginBody();
    $isGuest = Yii::$app->user->isGuest;
    $user = Yii::$app->user->identity->recordusers;
    $currentUser = $user->firstname;
?>
    <div class="wrap">
        <? NavBar::begin([
                'brandLabel' => Yii::$app->name . ' <b>Task Message</b>',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    ['label' => 'Task', 'url' => ['/admin/task/index'], 'visible' => !$isGuest],
                    $isGuest ? (
                        ['label' => 'Login', 'url' => ['/site/login']]
                    ) : (
                        '<li>'
                        . Html::beginForm(['/site/logout'], 'POST')
                        . Html::submitButton(
                            'Logout (' .  $currentUser  . ')',
                            ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm()
                        . '</li>'
                    )
                ],
            ]);
            NavBar::end();
        ?>
        <div class="container">
            <?= $content ?>
        </div>
        
    </div>
<? $this->endBody() ?>
</body>
</html>
<? $this->endPage() ?>
