<?php
namespace Repositories;
use lib\BaseDatos;
use Models\Usuario;

class UsuarioRepository extends BaseDatos {

    public function comprobarUsuarioLogin($usuario, $clave): bool|string {
        $sql = "SELECT nombre, clave FROM usuarios WHERE nombre = :usuario";
        $datos = $this->consultaPrep($sql, [":usuario" => $usuario]);

        if ($datos === false) {
            return "ERROR:<br> Usuario no registrado.";
        }

        return $this->verifyPassword($clave, $datos["clave"]) ? true : "ERROR:<br> Contraseña incorrecta.";
    }

    public function comprobarUsuarioSave($usuario) : bool {
        $sql = "SELECT nombre FROM usuarios WHERE nombre = :usuario";
        $existe = $this->consultaPrep($sql, [":usuario" => $usuario]);
        return !$existe;
    }

    public function getAll() : ?array {
        $this->consulta("SELECT * FROM usuarios");
        return $this->extraer_todos();
    }

    private function extraer_todos() : ?array {
        $usuarios = [];
        $usuariosData = $this->extraerTodos();

        foreach ($usuariosData as $usuarioData) {
            $usuarios[] = Usuario::fromArray($usuarioData);
        }

        return $usuarios;
    }

    public function getDatosUsuario($nombre) : array {
        $sql = "SELECT * FROM usuarios WHERE nombre = :nombre";
        return $this->consultaPrep($sql, [":nombre" => $nombre]);
    }

    public function save(array $usuario) : void {
        $this->validarDatos($usuario);
        if (count($usuario) == 2) {
            $this->consultaPrep("INSERT INTO usuarios (nombre, clave, rol) VALUES (:usuario, :clave, 2)", $usuario);
        }
        else if (count($usuario) == 3) {
            $this->consultaPrep("INSERT INTO usuarios (nombre, clave, rol) VALUES (:usuario, :clave, :rol)", $usuario);
        }

    }

    public function update(array $usuario) : void {
        $this->consultaPrep("UPDATE usuarios SET nombre = :usuario, clave = :clave, rol = :rol WHERE codigo = :codigo", $usuario);
    }

    public function delete(string $nombre) : void {
        $this->consultaPrep("DELETE FROM usuarios WHERE nombre = :nombre", ["nombre"=>$nombre]);
    }

    public function verifyPassword($clave, $hash) : bool {
        return password_verify($clave, $hash);
    }

    public function validarDatos(array $usuario) : string|bool {
        try {
            if (empty($usuario["nombre"])) {
                throw new \Exception("El nombre no puede estar vacío");
            }
            if (empty($usuario["clave"])) {
                throw new \Exception("La clave no puede estar vacía");
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }
}
