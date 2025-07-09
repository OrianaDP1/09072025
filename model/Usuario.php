<?php
class Usuario{
        private $idusuario;
	private $correoelectronico;
	private $nombreusuario;
	private $contrasena;
	private $estado;
        
        public function getIdUsuario(){
                return $this->idusuario;
        }
        public function setIdUsuario($idusuario){
                $this->idusuario = $idusuario;
        }
        
        public function getCorreoElectronico(){
                return $this->correoelectronico;
        }

        public function setCorreoElectronico($correoelectronico){
                $this->correoelectronico = $correoelectronico;
        }
        
        public function getNombreusuario(){
                return $this->nombreusuario;
        }

        public function setNombreusuario($nombreusuario){
                $this->nombreusuario = $nombreusuario;
        }

        public function getContrasena(){
                return $this->contrasena;
        }

        public function setContrasena($contrasena){
                $this->contrasena = $contrasena;
        }

        public function getEstado(){
                return $this->estado;
        }

        public function setEstado($estado){
                $this->estado = $estado;
        }
    }
?>