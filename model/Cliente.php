<?php
class Cliente {
    private $idcliente;
    private $empresa;
    private $RUC;
    private $nombres;
    private $apellidos;
    private $dni;
    private $fechacreacion;
    private $numerotel;
    private $nacionalidad;
    private $creadordecliente;
    private $ultimocontrato;
    private $encontrato;

    public function getIdcliente() {
        return $this->idcliente;
    }
    public function setIdcliente($idcliente) {
        $this->idcliente = $idcliente;
    }

    public function getEmpresa() {
        return $this->empresa;
    }
    public function setEmpresa($empresa) {
        $this->empresa = $empresa;
    }

    public function getRUC() {
        return $this->RUC;
    }
    public function setRUC($RUC) {
        $this->RUC = $RUC;
    }

    public function getNombres() {
        return $this->nombres;
    }
    public function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    public function getApellidos() {
        return $this->apellidos;
    }
    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    public function getDni() {
        return $this->dni;
    }
    public function setDni($dni) {
        $this->dni = $dni;
    }

    public function getFechacreacion() {
        return $this->fechacreacion;
    }
    public function setFechacreacion($fechacreacion) {
        $this->fechacreacion = $fechacreacion;
    }

    public function getNumerotel() {
        return $this->numerotel;
    }
    public function setNumerotel($numerotel) {
        $this->numerotel = $numerotel;
    }

    public function getNacionalidad() {
        return $this->nacionalidad;
    }
    public function setNacionalidad($nacionalidad) {
        $this->nacionalidad = $nacionalidad;
    }

    public function getCreadordecliente() {
        return $this->creadordecliente;
    }
    public function setCreadordecliente($creadordecliente) {
        $this->creadordecliente = $creadordecliente;
    }

    public function getUltimocontrato() {
        return $this->ultimocontrato;
    }
    public function setUltimocontrato($ultimocontrato) {
        $this->ultimocontrato = $ultimocontrato;
    }

    public function getEncontrato() {
        return $this->encontrato;
    }
    public function setEncontrato($encontrato) {
        $this->encontrato = $encontrato;
    }
}
?>