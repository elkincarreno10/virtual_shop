<header class="header">
    <div class="header__contenedor">
        <a href="/">
            <img class="header__logo" src="/build/img/logo.png" alt="Logo Página">
        </a>
        <a class="header__enlace--logo" href="/">Inicio</a>

        <nav class="header__navegacion">
            <a class="header__enlace" href="/productos">Productos</a>
            <a class="header__enlace" href="/nosotros">Nosotros</a>
            <a class="header__enlace" href="/contactanos">Contactanos</a>
            <?php if(is_auth()) { ?>
                <?php if(is_admin()) { ?>
                    <a class="header__enlace" href="/admin">Administrar</a>
                    <form method="POST" action="/admin/logout">
                        <button type="submit" class="header__logout">
                            Cerrar Sesión
                        </button>
                    </form>
                <?php } else { ?>
                    <form method="POST" action="/admin/logout">
                        <button type="submit" class="header__logout">
                            Cerrar Sesión
                        </button>
                    </form>
                <?php }; ?>
            <?php } else { ?>
                <a class="header__enlace" href="/login">Acceder</a>
            <?php }; ?>        
            <p id="carrito" class="header__enlace"><img class="header__enlace header__enlace--carrito" src="/build/img/carritoCompras.png" alt="Logo Página"></p>
        </nav>
    </div>
    <div class="carrito-productos ocultar">
        <h3 class="carrito-productos__titulo">Carrito de Compras</h3>
        <table class="producto-carrito">
            <thead>
                <tr>
                    <th>Cantidad</th>
                    <th>Producto</th>
                    <th class="no-mostrar">Imagen</th>
                    <th>Precio</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="tbody"></tbody>
        </table>
        <a href="#" class="vaciar_carrito">Vaciar Carrito</a>
    </div>
</header>