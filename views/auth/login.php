<h3 class="nosotros__mensaje">Inicia Sesión</h3>

<div class="alertas">
    <?php include_once __DIR__ . '/../templates/alertas.php'; ?>
</div>

<form method="POST" class="formulario">
    <fieldset class="formulario__fieldset">
        <legend class="formulario__legend">Ingresa Tus Datos</legend>

        <div class="formulario__campo">    
            <label for="email" class="formulario__label">Correo:</label>
            <input 
            type="mail" 
            class="formulario__input"
            id="email"
            name="email"
            placeholder="Tu Email"
            value=""
            >
        </div>
        <div class="formulario__campo">    
            <label for="password" class="formulario__label">Password:</label>
            <input 
            type="password" 
            class="formulario__input"
            id="password"
            name="password"
            placeholder="Tu Password"
            value=""
            >
        </div>

    </fieldset>

    <div class="enlaces">
        <a class="enlaces__enlace" href="/crear">¿Aún no tienes una cuenta? Crea una</a>
        <a class="enlaces__enlace" href="/olvide">¿Olvidaste tu password? Recuperalo Aquí</a>
    </div>

    <input class="formulario__submit formulario__submit--registrar" type="submit" value="Iniciar Sesión">
</form>