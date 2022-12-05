
<h1>Registrar un nuevo usuario</h1>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $link = base_url."Usuario/login";
    $error = "<p class='error'>El usuario ya existe,<br> <a href='$link'>inicie sesión</a></p>";
}

?>

<?php echo isset($_SESSION["usuario"]) ? "<h2>Admin: ".$_SESSION["usuario"]."</h2>" : ""?>

<div class="form_content">
    <form action="<?=base_url?>Usuario/save" method="post" class="form">
        <label for="usuario">Usuario:</label>
        <input type="text" name="data[usuario]" id="usuario" required class="input_field">
        <br>
        <label for="clave">Contrase&ntilde;a:</label>
        <input type="password" name="data[clave]" id="clave" required class="input_field">
        <br>
        <?php if(isset($_SESSION["admin"])) : ?>
            <label for="rol">Rol:</label>
            <select name="data[rol]" id="rol" class="input_field">
                <option value="1">1</option>
                <option value="2" selected>2</option>
            </select>
            <br>
        <?php endif; ?>
        <?= $error ?? "" ?>
        <input type="submit" value="Registrar Usuario" class="submit_registro">
    </form>
</div>