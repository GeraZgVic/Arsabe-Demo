<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Productos $producto */

$this->title = $producto->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="container py-4 d-flex flex-column align-items-center">
    <div class="py-3">
        <h1 class="text-center"><?= Html::encode($producto->nombre) ?></h1>
        <?php
        $imagenUrl = yii\helpers\Url::to("@web/uploads/{$producto->imagen}");
        ?>
        <img src="<?= $imagenUrl ?>" class="card-img-top img-fluid" alt="<?= $producto->nombre; ?>" style="width: 100vh; height: 90vh; object-fit: cover;">
        <div class="border p-3">
            <h5 class="card-title"><?= $producto->nombre; ?></h5>
            <hr class="my-2"> <!-- Línea horizontal para separar el título de los detalles -->
            <p class="card-text mb-1">
                <strong>Categoría:</strong>
                <?= $producto->categoria->nombre; ?>
            </p>
            <p class="card-text mb-1">
                <strong>Precio:</strong> <span class="precio">$<?= $producto->precio; ?> </span>
            </p>
        </div>
    </div>
</div>