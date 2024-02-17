<?php

use yii\helpers\Url;

/** @var yii\web\View $this */

$this->title = 'Arsabe';
?>

<div class="site-index">

    <section id="inicio">
        <?php include '/home/gera/arsabe/views/components/slide.php'; ?>
    </section>

    <section id="servicios" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Descubre Nuestros Servicios</h2>
            <p class="text-center">En Arsabe, nos dedicamos a proporcionar experiencias de belleza excepcionales para realzar tu bienestar y confianza.</p>

            <div class="row">
                <?php foreach ($servicios as $servicio) : ?>
                    <div class="col-md-6">
                        <div class="card mb-4 card-hov">
                            <img src="uploads/<?php echo $servicio->imagen; ?>" class="card-img-top" alt="<?php echo $servicio->titulo; ?>">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $servicio->titulo; ?></h4>
                                <p class="card-text"><?php echo $servicio->descripcion; ?></p>
                                <a href="#" class="boton-service">Conoce Más</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="productos" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Nuestros Productos</h2>
            <p class="text-center">Descubre nuestra amplia gama de productos para el cuidado de la belleza.</p>

            <?php include '/home/gera/arsabe/views/components/card.php'; ?>
            <div class="flex-btn-secondary">
                <a class="boton-secondary" href="<?= Url::to(['all_productos/index']) ?>">Ver más</a>

            </div>
        </div>
    </section>

</div>