<main class="banners">
    <div class="banners__contenedor slider swiper">
        <div class="banners__contenido swiper-wrapper">
            <picture class="swiper-slide">
                <source srcset="build/img/banner_1.webp" type="image/webp">
                <source srcset="build/img/banner_1.png" type="image/png">
                <img class="banners__imagen" loading="lazy" width="200" height="300" src="build/img/banner_1.png" alt="Imagen Oferta">
            </picture>
            <picture class="swiper-slide">
                <source srcset="build/img/banner_2.webp" type="image/webp">
                <source srcset="build/img/banner_2.png" type="image/png">
                <img class="banners__imagen" loading="lazy" width="200" height="300" src="build/img/banner_2.png" alt="Imagen Oferta">
            </picture>
            <picture class="swiper-slide">
                <source srcset="build/img/banner_3.webp" type="image/webp">
                <source srcset="build/img/banner_3.png" type="image/png">
                <img class="banners__imagen" loading="lazy" width="200" height="300" src="build/img/banner_3.png" alt="Imagen Oferta">
            </picture>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</main>

<section class="productos">
    <h1 class="productos__titulo">Compra tus productos favoritos al mejor precio del mercado</h1>
    <div class="productos__grid">
        <?php foreach($productos as $producto) { ?>
        <div class="producto">
            <h2 class="producto__nombre"><?php echo $producto->nombre; ?></h2>
            <img class="producto__imagen" src="img/productos/<?php echo $producto->imagen; ?>.webp" alt="Imagen Producto">
            <p class="producto__descripcion"><?php echo $producto->descripcion; ?></p>
            <p class="producto__precio">$<?php echo $producto->precio; ?></p>
        </div>
        <?php }; ?>
    </div>
    <div>
        <a class="productos__todos" href="/productos">Ver todos los productos</a>
    </div>
</section>




