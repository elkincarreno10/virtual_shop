<div class="confirmar">
    <h2 class="confirmar__titulo">Reestablecer</h2>

    <div class="alertas">
        <?php include_once __DIR__ . '/../templates/alertas.php'; ?>
    </div>

    <?php if($token_valido) { ?>
    <form method="POST" class="formulario">
        <fieldset class="formulario__fieldset">
            <legend class="formulario__legend">Ingresa Tu Nuevo Password</legend>

            <div class="formulario__campo">    
                <label for="password" class="formulario__label">Password:</label>
                <input 
                type="password" 
                class="formulario__input"
                id="password"
                name="password"
                placeholder="Tu Nuevo Password"
                >
            </div>

        </fieldset>

        <input class="formulario__submit formulario__submit--registrar" type="submit" value="Guardar Password">
    </form>
    <?php }; ?>

</div>