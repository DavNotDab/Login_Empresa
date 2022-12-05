<?php
namespace Controllers;
use Models\Usuario;
use Lib\Pages;
use Services\UsuarioService;


class UsuarioController {
    private UsuarioService $service;
    private Pages $pages;

    public function __construct() {
        $this->service = new UsuarioService();
        $this->pages = new Pages();
    }

    public function mostrarTodos() : void {
        $todos_mis_usuarios = $this->service->getAll();
        $this->pages->render("usuario/mostrar_todos", ["todos_mis_usuarios" => $todos_mis_usuarios]);
    }

    public function getDatosUsuario($nombre) : array {
        return $this->service->getDatosUsuario($nombre);
    }

    public function save() : void {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $verificado = $this->service->verifySave($_POST["data"]);

            if ($verificado === true) {
                $_POST["data"]["clave"] = password_hash($_POST["data"]["clave"], PASSWORD_BCRYPT, ["cost" => 4]);
                $this->service->save($_POST["data"]);
                $this->pages->render("usuario/guardado", ["mensaje" => "Usuario guardado"]);
            }
            else {
                $this->pages->render("usuario/form/registroUsuario");
            }
        } else {
            $this->pages->render("usuario/form/registroUsuario");
        }
    }

    public function update() : void {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->service->update($_POST["data"]);
            $this->pages->render("usuario/guardado", ["mensaje" => "Usuario modificado"]);
            header("Location: ".base_url."usuario/mostrarTodos");
        } else {
            $usuario = $this->service->getDatosUsuario($_GET["usuario"]);
            $this->pages->render("usuario/form/modificarUsuario", ["usuario" => $usuario]);
        }
    }

    public function delete() : void {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_POST["usuario"] != "X") $this->service->delete($_POST["usuario"]);
            $_SERVER['REQUEST_METHOD'] = 'GET';
            $_GET["usuario"] = $_POST["usuario"];
        }

        $this->pages->render("usuario/mostrar_todos", ["todos_mis_usuarios" => $this->service->getAll()]);

    }

    public function login() : void{
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $estado = $this->service->verifyLogin($_POST["data"]);
            session_start();
            if ($estado === true) {
                $_SESSION["usuario"] = $_POST["data"]["usuario"];
                header("Location: ".base_url);
            }
            else {
                $_SESSION["error"] = $estado;
            }
        }
        $this->pages->render("usuario/login");
    }

    public function logout() : void {
        session_start();
        if (isset($_SESSION["usuario"])) {
            unset($_SESSION["usuario"]);
        }
        if (isset($_SESSION["admin"])) {
            unset($_SESSION["admin"]);
        }
        session_destroy();
        header("Location: ".base_url."inicio.php");
    }

    public function index(): void{
    }

}

