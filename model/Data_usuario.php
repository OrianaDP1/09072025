<?php
class Data_usuario {
    private $iddata;
    private $nombre;
    private $apellido;
    private $dni;
    private $especialidad;
    private $informacionactual;
    private $fechacreacion;
    private $idusuario;

    public function getIddata(){
        return $this->iddata;
    }
    public function setIddata($iddata){
        $this->iddata = $iddata;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function getDni(){
        return $this->dni;
    }
    public function setDni($dni){
        $this->dni = $dni;
    }

    public function getEspecialidad(){
        return $this->especialidad;
    }
    public function setEspecialidad($especialidad){
        $this->especialidad = $especialidad;
    }

    public function getInformacionactual(){
        return $this->informacionactual;
    }
    public function setInformacionactual($informacionactual){
        $this->informacionactual = $informacionactual;
    }

    public function getFechacreacion(){
        return $this->fechacreacion;
    }
    public function setFechacreacion($fechacreacion){
        $this->fechacreacion = $fechacreacion;
    }

    public function getIdusuario(){
        return $this->idusuario;
    }
    public function setIdusuario($idusuario){
        $this->idusuario = $idusuario;
    }
}
?>
