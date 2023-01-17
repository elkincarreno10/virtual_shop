<h3 class="nosotros__mensaje">Reestablece Tu Password</h3>

<div class="alertas">
    <?php include_once __DIR__ . '/../templates/alertas.php'; ?>
</div>

<form action="/olvide" method="POST" class="formulario">
    <fieldset class="formulario__fieldset">
        <legend class="formulario__legend">Ingresa tu Email</legend>

        <div class="formulario__campo">    
            <label for="email" class="formulario__label">Email:</label>
            <input 
            type="mail" 
            class="formulario__input"
            id="email"
            name="email"
            placeholder="Tu Email"
            value=""
            >
        </div>

    </fieldset>
    
    <div class="enlaces">
        <a class="enlaces__enlace" href="/login">¿Ya tienes una cuenta? Inicia Sesión</a>
        <a class="enlaces__enlace" href="/crear">¿Aún no tienes una cuenta? Crea una</a>
    </div>

    <input class="formulario__submit formulario__submit--registrar" type="submit" value="Enviar Instrucciones">
    
</form>

