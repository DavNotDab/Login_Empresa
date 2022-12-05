
<h1>Modificar un usuario</h1>

<div class="form_content">
    <form action="<?=base_url?>Usuario/update" method="post" class="form">
        <input type="hidden" name="data[codigo]" id="codigo" value="<?php if(isset($usuario)) echo $usuario['codigo']?>">
        <label for="usuario">Usuario:</label>
        <input class="input_field" type="text" name="data[usuario]" id="usuario" value="<?php if(isset($usuario)) echo $usuario['nombre']?>" required>
        <br>
        <label for="clave">Contrase&ntilde;a:</label>
        <input class="input_field" type="text" name="data[clave]" id="clave" value="<?php if(isset($usuario)) echo $usuario['clave']?>" required>
        <br>
        <label for="rol">Rol:</label>
        <select name="data[rol]" id="rol" class="input_field">
            <option value="1" <?php if (isset($usuario) && ($usuario['rol'] == 1)) echo "selected"?>>1</option>
            <option value="2" <?php if (isset($usuario) && ($usuario['rol'] == 2)) echo "selected"?>>2</option>
        </select>
        <br>
        <?= $error ?? "" ?>
        <input type="submit" value="Actualizar datos" class="submit_modify">
    </form>
</div>