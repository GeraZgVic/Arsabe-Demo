<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Inventario $model */

$this->title = 'Agregar Producto';
$this->params['breadcrumbs'][] = ['label' => 'Inventarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventario-create container py-5">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
