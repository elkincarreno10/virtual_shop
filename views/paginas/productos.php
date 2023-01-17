<section class="productos">
    <h1 class="productos__titulo">Compra tus productos favoritos al mejor precio del mercado</h1>
    <div class="productos__grid">
        <?php foreach($productos as $producto) { ?>
            <div class="producto">
                <h2 class="producto__nombre"><?php echo $producto->nombre; ?></h2>
                <img class="producto__imagen" src="img/productos/<?php echo $producto->imagen; ?>.webp" alt="Imagen Producto">
                <p class="producto__descripcion"><?php echo $producto->descripcion; ?></p>
                <p class="producto__precio">$<?php echo $producto->precio; ?></p>
                <a href="#" class="producto__enlace agregar-producto" id="agregar" data-id="<?php echo $producto->id; ?>">Agregar al carrito</a>
            </div>
        <?php }; ?>
    </div>
</section>