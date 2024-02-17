<div class="row">
    <?php foreach ($productos as $producto) : ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm  card-hov">
                <?php
                $imagenUrl = yii\helpers\Url::to("@web/uploads/{$producto->imagen}");
                ?>
                <img src="<?= $imagenUrl ?>" class="card-img-top img-fluid" alt="<?= $producto->nombre; ?>" style="object-fit: cover; height: 200px;">
                <div class="card-body">
                    <h5 class="card-title"><?= $producto->nombre; ?></h5>
                    <p class="card-text mb-1">
                        <strong>Categoría:</strong>
                        <?= $producto->categoria->nombre; ?>
                    </p>
                    <p class="card-text mb-1">
                        <strong>Precio:</strong> <span class="precio">$<?= $producto->precio; ?> </span>
                    </p>
                </div>
                <div class="card-footer text-center">
                    <a href="<?= yii\helpers\Url::to(['all_productos/view', 'id' => $producto->id]) ?>" class="boton">Ver Detalles</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

