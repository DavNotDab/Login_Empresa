<?php
namespace Models;

class Usuario {

    public function __construct(
        private int    $codigo,
        private string $nombre,
        private string $clave,
        private string $rol

    ) {}

    public function getCodigo(): int {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): void {
        $this->codigo = $codigo;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function getClave(): string {
        return $this->clave;
    }

    public function setClave(string $clave): void {
        $this->clave = $clave;
    }

    public function getRol(): string {
        return $this->rol;
    }

    public function setRol(string $rol): void {
        $this->rol = $rol;
    }

    public function toArray(): array {
        return [
            "codigo" => $this->codigo,
            "nombre" => $this->nombre,
            "clave"  => $this->clave,
            "rol"    => $this->rol
        ];
    }

    public static function fromArray(array $array) : self {
        return new self(
            $array['codigo'],
            $array['nombre'],
            $array['clave'],
            $array['rol']
        );
    }

}
