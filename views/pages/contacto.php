<div class="contacto__grid">
    <div class="contacto__main contacto__imagen">
        <img class="contacto__img" src="\build\img\World Bicycle Day-bro.avif" alt="bike">
    </div>
    <div class="contacto__main">
        <h2 class="contacto__main--titulo"><?php echo $titulo; ?></h2>

        <?php include_once __DIR__ . '/../templates/alertas.php';?>

        <form action="/contacto" class="formulario" method="POST">     

            <div class="formulario__nombres">

                <div class="formulario__campo">
                    <label for="nombre" class="formulario__label">Nombres</label>
                    <input 
                        type="text" 
                        class="formulario__input" 
                        placeholder="Tu Nombre" 
                        id="nombre" 
                        name="nombre" 
                        value="<?php echo $usuario->nombre;?>"
                    />
                </div>

                <div class="formulario__campo">
                    <label for="apellido" class="formulario__label">Apellidos</label>
                    <input 
                        type="text"
                        class="formulario__input" 
                        placeholder="Tu Apellido" 
                        id="apellido" 
                        name="apellido" 
                        value="<?php echo $usuario->apellido;?>"
                    />
                </div>

            </div>

            <div class="formulario__campo">
                <label for="email" class="formulario__label">Email</label>
                <input 
                    type="email" 
                    class="formulario__input" 
                    placeholder="Tu Email" 
                    id="email" 
                    name="email" 
                    value="<?php echo $usuario->email;?>"
                />
                <i class="formulario__input--icon fa-solid fa-envelope" id="icon_email"></i>
            </div>

            <div class="formulario__campo">
                <label for="telefono" class="formulario__label">Teléfono</label>
                
                <input 
                    type="tel"
                    class="formulario__input" 
                    placeholder="Tu Teléfono" 
                    id="telefono" 
                    name="telefono" 
                    value="<?php echo $usuario->telefono;?>"
                />
                <i class="formulario__input--icon fa-solid fa-phone" id="icon_phone"></i>
                
            </div>

            <input type="submit" class="formulario__submit" value="Enviar">
        </form>
    </div>

</div>

