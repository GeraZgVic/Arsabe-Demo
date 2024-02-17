<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\widgets\Alert;
use yii\bootstrap5\Nav;
use app\assets\AppAsset;
use yii\bootstrap5\Html;
use yii\bootstrap5\NavBar;
use yii\bootstrap5\Breadcrumbs;
use webvimark\modules\UserManagement\components\GhostMenu;
use webvimark\modules\UserManagement\UserManagementModule;


AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
$this->registerCssFile(Yii::getAlias('@web/css/style.css'));


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body style="background-color: var(--bs-gray-100);">
    <?php $this->beginBody() ?>

    <header id="header">
    
        <?php
        NavBar::begin([
            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-expand-md fixed-top navbar-dark',
                'style' => 'background-color: #be0b6d;'
            ]
        ]);

        $menuItems = [
            ['label' => 'Inicio', 'url' => ['/']],
            ['label' => 'Nosotros', 'url' => ['/site/about']],
            ['label' => 'Contactanos', 'url' => ['/site/contact']],

        ];

        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => 'Iniciar Sesión', 'url' => ['/user-management/auth/login']];
        } else {
            // $menuItems[] = ['label' => 'Productos', 'url' => ['/productos/index']];
            // $menuItems[] = ['label' => 'Servicios', 'url' => ['/servicios/index']];
            $menuItems[] = [
                'label' => 'Administrar',
                'items' => UserManagementModule::menuItems()
            ];
            $menuItems[] = '<li class="nav-item">'
                . Html::beginForm(['/user-management/auth/logout'])
                . Html::submitButton(
                    'Cerrar Sesión (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'nav-link btn btn-link logout']
                )
                . Html::endForm()
                . '</li>';
        }

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav '],
            'items' => $menuItems,
        ]);

        NavBar::end();
        ?>
    </header>

    <main id="main" class="flex-shrink-0" role="main">
        <div class="py-4">
            <?php if (!empty($this->params['breadcrumbs'])) : ?>
                <div class="container-sm pt-5">
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
                </div>
                <?php endif ?>
                <?= Alert::widget() ?>
            </div>
            <?= $content ?>
    </main>

    <footer style="background-color: #be0b6d;" id="footer" class="mt-auto py-3">
        <div class="container">
            <div class="row text-muted">
                <p style="color:#fff" class="col-md-6 text-center text-md-start">&copy; Todos los derechos reservados <?= date('Y') ?></p>
            </div>
        </div>
    </footer>

    
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>