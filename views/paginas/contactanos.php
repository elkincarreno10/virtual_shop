<h3 class="nosotros__mensaje">Déjanos un mensaje</h3>

<form action="" class="formulario">
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
            value=""
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
            value=""
            >
        </div>
        <div class="formulario__campo">    
            <label for="correo" class="formulario__label">Correo:</label>
            <input 
            type="mail" 
            class="formulario__input"
            id="correo"
            name="correo"
            placeholder="Tu Correo"
            value=""
            >
        </div>
        <div class="formulario__campo">    
            <label for="telefono" class="formulario__label">Teléfono:</label>
            <input 
            type="tel" 
            class="formulario__input"
            id="telefono"
            name="telefono"
            placeholder="Tu Teléfono"
            value=""
            >
        </div>
        <div class="formulario__campo">    
            <label for="mensaje" class="formulario__label">Mensaje:</label>
            <textarea name="mensaje" id="mensaje" rows="8"></textarea>
        </div>
    </fieldset>

    <input class="formulario__submit formulario__submit--registrar" type="submit" value="Enviar Mensaje">
</form>
