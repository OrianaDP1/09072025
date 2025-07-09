<?php
class Tipoproyecto {
    private $idtipoproyecto;
    private $nombre;
    private $descripcion;

    public function getIdtipoproyecto() {
        return $this->idtipoproyecto;
    }
    public function setIdtipoproyecto($idtipoproyecto) {
        $this->idtipoproyecto = $idtipoproyecto;
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
}
?>