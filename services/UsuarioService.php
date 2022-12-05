<?php
namespace Services;
use Repositories\UsuarioRepository;

class UsuarioService {

    private UsuarioRepository $repository;

    function __construct() {
        $this->repository = new UsuarioRepository();
    }

    public function getAll() : ?array {
        return $this->repository->getAll();
    }

    public function save(array $usuario) : void {
        $this->repository->save($usuario);
    }

    public function update(array $usuario) : void {
        $this->repository->update($usuario);
    }

    public function delete(string $nombre) : void {
        $this->repository->delete($nombre);
    }

    public function verifyLogin(array $data): bool|string {
       return $this->repository->comprobarUsuarioLogin($data["usuario"], $data["clave"]);
    }

    public function verifySave(array $data) : bool {
        return $this->repository->comprobarUsuarioSave($data["usuario"]);
    }

    public function getDatosUsuario($nombre): array {
        return $this->repository->getDatosUsuario($nombre);
    }

}