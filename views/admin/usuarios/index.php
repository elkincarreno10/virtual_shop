<div class="admin-productos">
    <h1 class="admin-productos__titulo">Administrador de Usuarios</h1>
    <?php if(empty($usuarios)) { ?>
        <p class="admin-productos__no-usuarios">No hay usuarios registrados aún</p>
    <?php }; ?>

    <?php if(!empty($usuarios)) { ?>
        <table class="tabla">
            <thead class="tabla__thead">
                <tr class="tabla__thead--usuario">
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="tabla__tbody">
            <?php foreach($usuarios as $usuario) { ?>
                <tr class="tabla__tbody--tr">
                    <td><?php echo $usuario->id; ?></td>
                    <td><?php echo $usuario->nombre; ?></td>
                    <td><?php echo $usuario->email; ?></td>
                    <td>
                        <form method="POST" action="/admin/usuarios/eliminar" class="tabla__eliminar">
                            <input type="hidden" name="id" value="<?php echo $usuario->id; ?>">
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
</div>