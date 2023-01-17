<div class="productos-actualizar">
    <h2 class="nosotros__titulo">Actualiza el Producto</h2>

    <div class="alertas">
        <?php include_once __DIR__ . '/../../templates/alertas.php'; ?>
    </div>

    <form method="POST" class="formulario" enctype="multipart/form-data">
        <fieldset class="formulario__fieldset">
            <legend class="formulario__legend">Información Producto</legend>

            <div class="formulario__campo">    
                <label for="nombre" class="formulario__label">Nombre:</label>
                <input 
                type="text" 
                class="formulario__input"
                id="nombre"
                name="nombre"
                placeholder="Nombre del Producto"
                value="<?php echo $producto->nombre ?? ''; ?>"
                >
            </div>
            <div class="formulario__campo">    
                <label for="descripcion" class="formulario__label">Descripcion:</label>
                <input 
                type="text" 
                class="formulario__input"
                id="descripcion"
                name="descripcion"
                placeholder="Descripcion del Producto"
                value="<?php echo $producto->descripcion ?? ''; ?>"
                >
            </div>
            <div class="formulario__campo">    
                <label for="precio" class="formulario__label">Precio:</label>
                <input 
                type="number" 
                class="formulario__input"
                id="precio"
                name="precio"
                placeholder="Precio"
                value="<?php echo $producto->precio ?? ''; ?>"
                >
            </div>
            <div class="formulario__campo">    
                <label for="imagen" class="formulario__label">Imagen:</label>
                <input 
                type="file" 
                class="formulario__input"
                id="imagen"
                name="imagen"
                placeholder="Imagen"
                value=""
                >
            </div>
            <img class="tabla__tbody--imagen" src="/../../img/productos/<?php echo $producto->imagen . '.png'; ?>" alt="Imagen Producto">
        </fieldset>

        <div class="botones">
            <input class="formulario__submit" type="submit" value="Agregar Producto">
            <a class="formulario__submit formulario__submit--volver" href="/admin/productos">
                Volver
            </a>
        </div>
    </form>
</div>

