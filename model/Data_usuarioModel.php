<?php
    require_once './config/DB.php';
    require_once 'Categoria.php';
    class Data_usuarioModel{
        private $db;

        public function __construct(){
            $this->db=DB::conectar();
        }

        public function guardar(Data_usuario $data_usuario){
            $sql="insert into data_usuario (nombre, apellido, dni, especialidad, informacionactual, idusuario) values (:no, :ap, :dn, :es, :ia, :iu),";
            $ps=$this->db->prepare($sql);
            $ps->bindParam(":no", $data_usuario->getNombre());
            $ps->bindParam(":ap", $data_usuario->getApellido());
            $ps->bindParam(":dn", $data_usuario->getDni());
            $ps->bindParam(":es", $data_usuario->getEspecialidad());
            $ps->bindParam(":ia", $data_usuario->getInformacionactual());
            $ps->bindParam(":iu", $data_usuario->getIdusuario());
            $ps->execute();
        }

        public function cargar(){
            $sql="select * from data_usuario";
            $ps=$this->db->prepare($sql);
            $ps->execute();
            $filas=$ps->fetchall();
            $data_usuarios=array();
            foreach($filas as $f){
                $cat=new Data_usuario();
                $cat->setIddata($f[0]);
                $cat->setNombre($f[1]);
                $cat->setApellido($f[2]);
                $cat->setDni($f[3]);
                $cat->setEspecialidad($f[4]);
                $cat->setInformacionactual($f[5]);
                $cat->setFechacreacion($f[6]);
                $cat->setIdusuario($f[7]);
            }
            return $data_usuarios;
        }

//        public function borrar($idcat){
//            $sql="delete from categoria where idcategoria=:idcat";
//            $ps=$this->db->prepare($sql);
//            $ps->bindParam(':idcat', $idcat);
//            $ps->execute();
//        }
    }
?>