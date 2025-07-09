<?php  
    require_once './config/DB.php';
    require_once 'Usuario.php';

    class UsuarioModel{
        private $db;
        public function __construct(){
            $this->db=DB::conectar();
        }

        public function guardar(Usuario $usuario){
            $sql="INSERT INTO usuario (correoelectronico, nombreusuario, contrasena, estado) VALUES (:ce, :nu, :co, :es)";
            $ps=$this->db->prepare($sql);
            $ps->bindParam(":ce", $usuario->getCorreoElectronico());
            $ps->bindParam(":nu", $usuario->getNombreusuario());
            $ps->bindParam(":co", $usuario->getContrasena());
            $ps->bindParam(":es", $usuario->getEstado());
            $ps->execute();
        }
        public function cargar(){
            $sql="select * from usuario";
            $ps=$this->db->prepare($sql);
            $ps->execute();
            $filas=$ps->fetchall();
            $usurios=array();
            foreach($filas as $f){
                $fam=new Usuario();
                $fam->setIdUsuario($f[0]);
                $fam->setCorreoElectronico($f[1]);
                $fam->setNombreusuario($f[2]);
                $fam->setContrasena($f[3]);
                $fam->setEstado($f[4]);
                array_push($usurios, $fam);
            }
            return $usurios;
        }
//       public function borrar($idcli){
//           $sql="delete from usuario where idcliente=:idcli";
//           $ps=$this->db->prepare($sql);
//           $ps->bindParam(':idcli', $idcli);
//           $ps->execute();
//       }

    }
?>