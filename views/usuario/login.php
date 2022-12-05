
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error = "<p class='error'>".$_SESSION["error"]."</p>";
}
?>

    <h1>Introduzca credenciales:</h1>

    <div class="form_content">
        <form action="<?=base_url?>Usuario/login" method="post" class="form">
            <label for="usuario">Usuario:</label>
            <input type="text" name="data[usuario]" id="usuario" required class="input_field"><br>
            <label for="clave">Contraseña:</label>
            <input type="password" name="data[clave]" id="clave" required class="input_field"><br>
            <span> <?= $error ?? ""?></span>
            <input type="submit" value="Iniciar Sesión" class="submit_login">
        </form>

        <span>¿A&uacute;n no es usuario? <a href="<?=base_url?>Usuario/save">Reg&iacute;strese</a></span>
    </div>


