<h2 class="contacto__main--titulo"><?php echo $titulo; ?></h2>



<form action="/reporta" class="formulario-contenedor" method="POST">

    <?php include_once __DIR__ . '/../templates/alertas.php';?>

    <div class="formulario__implicados">

        <div class="formulario__campo">
            <label for="nombre" class="formulario__label">Genero de Biciusuario</label>
            <select class="formulario__select" id="genero" name="genero">
                <option value="">--Seleccionar--</option>
                <?php foreach ($generos as $genero) : ?>
                    <option <?php echo ($genero->id === $incidencia->generoid) ? 'selected': ''; ?> value="<?php echo $genero->genero ;?>">
                        <?php echo $genero->genero; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>


        <div class="formulario__campo">
            <label for="apellido" class="formulario__label">Nivel de Afectación</label>
            <select class="formulario__select" id="afectacion" name="afectacion">
                <option value="">--Seleccionar--</option>
                <?php foreach ($afectacion as $afectado) { ?>
                    <option <?php echo ($afectado->id === $incidencia->afectacionid) ? 'selected': ''; ?> value="<?php echo $afectado->nivel; ?>"><?php echo $afectado->nivel; ?></option>
                <?php } ?>
            </select>
        </div>


        <div class="formulario__campo">
            <label for="email" class="formulario__label">Hora Aproximada</label>
            <input type="time" class="formulario__input" placeholder="Hora" id="hora" name="hora" value="<?php echo $incidencia->hora; ?>" />
        </div>

        <div class="formulario__campo">
            <label for="apellido" class="formulario__label">Localidad</label>
            <select class="formulario__select" id="localidad" name="localidad">
                <option value="">--Seleccionar--</option>
                <?php foreach ($localidades as $localidad) { ?>
                    <option <?php echo ($localidad->id === $incidencia->localidadid) ? 'selected': ''; ?> value="<?php echo $localidad->nombre; ?>"><?php echo  $localidad->id . '. ' . $localidad->nombre; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="formulario__campo">
            <label for="email" class="formulario__label">Dirección Accidente</label>
            <input type="text" class="formulario__input" placeholder="Dirección" id="direccion" name="direccion" value="<?php echo $incidencia->direccion;?>" />
            <i class="formulario__input--icon fa-solid fa-diamond-turn-right" id="icon_direction"></i>
        </div>


        <input type="hidden"   id="longitud" name="longitud" value="<?php $incidencia->longitud ;?>" />
        <input type="hidden"   id="latitud" name="latitud" value="<?php $incidencia->latitud ;?>" />




        <input type="submit" class="formulario__submit" value="Enviar">

    </div>

    




</form>

<div class="mapa mapa__contenedor" id="mapa"></div>