<?php
class Proyecto {
    private $idproyecto;
    private $nombre;
    private $descripcion;
    private $estado;
    private $ultimaactualizacion;
    private $repoGIT;
    private $idcliente;
    private $idgrupousuario;
    private $idsubtproyecto;

    public function getIdproyecto() {
        return $this->idproyecto;
    }
    public function setIdproyecto($idproyecto) {
        $this->idproyecto = $idproyecto;
    }

    public function getNombre() {
        return $this->nombre;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getEstado() {
        return $this->estado;
    }
    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getUltimaactualizacion() {
        return $this->ultimaactualizacion;
    }
    public function setUltimaactualizacion($ultimaactualizacion) {
        $this->ultimaactualizacion = $ultimaactualizacion;
    }

    public function getRepoGIT() {
        return $this->repoGIT;
    }
    public function setRepoGIT($repoGIT) {
        $this->repoGIT = $repoGIT;
    }

    public function getIdcliente() {
        return $this->idcliente;
    }
    public function setIdcliente($idcliente) {
        $this->idcliente = $idcliente;
    }

    public function getIdgrupousuario() {
        return $this->idgrupousuario;
    }
    public function setIdgrupousuario($idgrupousuario) {
        $this->idgrupousuario = $idgrupousuario;
    }

    public function getIdsubtproyecto() {
        return $this->idsubtproyecto;
    }
    public function setIdsubtproyecto($idsubtproyecto) {
        $this->idsubtproyecto = $idsubtproyecto;
    }
}
?>