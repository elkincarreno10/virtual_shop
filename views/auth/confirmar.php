<div class="confirmar">
    <h2 class="confirmar__titulo">Confirmación de cuenta</h2>

    <div class="alertas">
        <?php include_once __DIR__ . '/../templates/alertas.php'; ?>
    </div>

    <?php if(empty($alertas['error'])) { ?>
        <a class="confirmar__enlace" href="/login">Inicia Sesión</a>
    <?php };?>
</div>