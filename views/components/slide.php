<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <?php for ($i = 1; $i < count($productos); $i++): ?>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="<?= $i ?>" aria-label="Slide <?= $i + 1 ?>"></button>
        <?php endfor; ?>
    </div>
    <div class="carousel-inner">
        <?php foreach ($productos as $key => $producto): ?>
            <div class="carousel-item <?php echo $key === 0 ? 'active' : ''; ?>" data-bs-interval="2000">
                <img src="uploads/<?php echo $producto->imagen; ?>" class="img overlay mx-auto " alt="...">
                <div class="carousel-caption d-flex align-items-center justify-content-center bg-rosa">
                    <div class="text-center text-dark">
                        <h2>Bienvenido a Arsabe</h2>
                        <p>Descubre nuestra exclusiva colección de productos de belleza</p>
                        <h5><?php echo $producto->nombre; ?></h5>
                        <p class="precio">$<?php echo $producto->precio ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
