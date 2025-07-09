<?php
class Subtproyecto {
    private $idsubtproyecto;
    private $nombre;
    private $descripcion;
    private $idtipoproyecto;

    public function getIdsubtproyecto() {
        return $this->idsubtproyecto;
    }
    public function setIdsubtproyecto($idsubtproyecto) {
        $this->idsubtproyecto = $idsubtproyecto;
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

    public function getIdtipoproyecto() {
        return $this->idtipoproyecto;
    }
    public function setIdtipoproyecto($idtipoproyecto) {
        $this->idtipoproyecto = $idtipoproyecto;
    }
}
?>
