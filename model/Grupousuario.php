<?php
class Grupousuario {
    private $idgrupousuario;
    private $nombregrupo;
    private $estado;
    private $fechacreacion;
    private $idencargado;

    public function getIdgrupousuario() {
        return $this->idgrupousuario;
    }
    public function setIdgrupousuario($idgrupousuario) {
        $this->idgrupousuario = $idgrupousuario;
    }

    public function getNombregrupo() {
        return $this->nombregrupo;
    }
    public function setNombregrupo($nombregrupo) {
        $this->nombregrupo = $nombregrupo;
    }

    public function getEstado() {
        return $this->estado;
    }
    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getFechacreacion() {
        return $this->fechacreacion;
    }
    public function setFechacreacion($fechacreacion) {
        $this->fechacreacion = $fechacreacion;
    }

    public function getIdencargado() {
        return $this->idencargado;
    }
    public function setIdencargado($idencargado) {
        $this->idencargado = $idencargado;
    }
}
?>