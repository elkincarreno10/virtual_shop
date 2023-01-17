<div class="admin-productos">
    <h1 class="admin-productos__titulo">Administrador de Productos</h1>
    <?php if(empty($productos)) { ?>
        <p class="admin-productos__no-productos">No hay productos registrados aún</p>
    <?php }; ?>

    <?php if(!empty($productos)) { ?>
        <table class="tabla">
            <thead class="tabla__thead">
                <tr class="tabla__thead--tr">
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="tabla__tbody">
            <?php foreach($productos as $producto) { ?>
                <tr class="tabla__tbody--tr">
                    <td><?php echo $producto->id; ?></td>
                    <td><?php echo $producto->nombre; ?></td>
                    <td><?php echo $producto->descripcion; ?></td>
                    <td>$ <?php echo $producto->precio; ?></td>
                    <td class="tabla__tbody--imagen"><img src="/../img/productos/<?php echo $producto->imagen . '.png'; ?>" alt="Imagen Producto"></td>
                    <td>
                        <a class="tabla__actualizar" href="/admin/productos/actualizar?id=<?php echo $producto->id; ?>">Actualizar</a>
                        <form method="POST" action="/admin/productos/eliminar" class="tabla__eliminar">
                            <input type="hidden" name="id" value="<?php echo $producto->id; ?>">
                            <button type="submit">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            <?php }; ?>
            </tbody>
        </table>
    <?php }; ?>

    <a class="admin-productos__enlace" href="/admin/productos/crear">Agregar Producto</a>
</div>