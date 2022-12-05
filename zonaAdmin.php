<?php
require_once "autoloader.php";
require_once "config/config.php";
require_once "views/layout/header.php";

session_start();
$usuario = $_SESSION["usuario"];
$_SESSION["admin"] = $usuario;
?>

<h1>Bienvenido a la zona admin <?=$usuario?></h1>

<?php
require_once "views/layout/aside_Nav.php";
require_once "views/layout/footer.php";