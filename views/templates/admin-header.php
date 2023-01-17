<header class="dashboard__header">
    <a href="/">
        <img class="header__logo dashboard__header__logo" src="/build/img/logo.png" alt="Logo Página">
    </a>
    <a href="/" class="dashboard__header__inicio">Inicio</a>
    <div class="dashboard__header__barra-superior">
        <p class="dashboard__header__texto">Hola:<span><?php echo $nombre; ?></span></p>

        <form method="POST" action="/admin/logout">
            <button type="submit" class="dashboard__header__logout">
                Cerrar Sesión
            </button>
        </form>
    </div>
</header>