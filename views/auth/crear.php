<h3 class="nosotros__mensaje">Crear Una Cuenta</h3>

<div class="alertas">
    <?php include_once __DIR__ . '/../templates/alertas.php'; ?>
</div>

<form method="POST" class="formulario">
    <fieldset class="formulario__fieldset">
        <legend class="formulario__legend">Información Personal</legend>

        <div class="formulario__campo">    
            <label for="nombre" class="formulario__label">Nombre:</label>
            <input 
            type="text" 
            class="formulario__input"
            id="nombre"
            name="nombre"
            placeholder="Tu Nombre"
            value="<?php echo $usuario->nombre; ?>"
            >
        </div>
        <div class="formulario__campo">    
            <label for="apellido" class="formulario__label">Apellido:</label>
            <input 
            type="text" 
            class="formulario__input"
            id="apellido"
            name="apellido"
            placeholder="Tu Apellido"
            value="<?php echo $usuario->apellido; ?>"
            >
        </div>
        <div class="formulario__campo">    
            <label for="email" class="formulario__label">Email:</label>
            <input 
            type="mail" 
            class="formulario__input"
            id="email"
            name="email"
            placeholder="Tu Email"
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
        <a class="enlaces__enlace" href="/login">¿Ya tienes una cuenta? Inicia Sesión</a>
        <a class="enlaces__enlace" href="/olvide">¿Olvidaste tu password? Recuperalo Aquí</a>
    </div>

    <input class="formulario__submit formulario__submit--registrar" type="submit" value="Crear Cuenta">
</form>