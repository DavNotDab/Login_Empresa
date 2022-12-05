
<?php
require_once "autoloader.php";
require_once "config/config.php";
require_once "views/layout/header.php";
use Controllers\FrontController;
FrontController::main();

?>

    <nav class="nav_menu">
        <ul class="links">
            <?php if (isset($_SESSION["usuario"])) : ?>
                <li><a href="<?=base_url?>Usuario/logout">Cerrar Sesi&oacute;n</a></li>
            <?php else: ?>
                <li><a href="<?=base_url?>inicio.php">Inicio</a></li>
                <li><a href="<?=base_url?>Usuario/login">Iniciar Sesi&oacute;n</a></li>
            <?php endif; ?>
            <li><a href="<?=base_url?>Usuario/save"><?php echo isset($_SESSION["admin"]) ? "Registrar usuario" : "Registrarse"?></a></li>
            <?php if (isset($_SESSION["admin"])) : ?>
                <li><a href="<?=base_url?>zonaAdmin.php">Zona admin</a></li>
            <?php endif; ?>
        </ul>
    </nav>

<?php
require_once "views/layout/footer.php";