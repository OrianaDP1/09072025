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
        public function cargarporEstado(){
            $sql="select idusuario,correoelectronico,nombreusuario,estado from usuario where estado=1";
            $ps=$this->db->prepare($sql);
            $ps->execute();
            $filas=$ps->fetchall();
            $usuarios=array();
            foreach($filas as $f){
                $fam=new Usuario();
                $fam->setIdUsuario($f[0]);
                $fam->setCorreoElectronico($f[1]);
                $fam->setNombreusuario($f[2]);
                $fam->setEstado($f[3]);
                array_push($usuarios, $fam);
            }
            return $usuarios;
        }

        public function validarLogin($nombreusuario, $contrasena) {
            $sql = "SELECT * FROM usuario WHERE nombreusuario = :nu AND contrasena = :co AND estado = 0";
            $ps = $this->db->prepare($sql);
            $ps->bindParam(':nu', $nombreusuario);
            $ps->bindParam(':co', $contrasena);
            $ps->execute();
            $fila = $ps->fetch(PDO::FETCH_ASSOC);

            if ($fila) {
                $usuario = new Usuario();
                $usuario->setIdUsuario($fila['idusuario']);
                $usuario->setCorreoElectronico($fila['correoelectronico']);
                $usuario->setNombreusuario($fila['nombreusuario']);
                $usuario->setContrasena($fila['contrasena']);
                $usuario->setEstado($fila['estado']);
                return $usuario;
            }
            return null;
        }

        public function activarUsuario($idusuario) {
            $sql = "UPDATE usuario SET estado = 0 WHERE idusuario = :id";
            $ps = $this->db->prepare($sql);
            $ps->bindParam(':id', $idusuario);
            $ps->execute();
        }

       public function borrar($idusu){
           $sql="delete from usuario where idusuario=:idusu";
           $ps=$this->db->prepare($sql);
           $ps->bindParam(':idusu', $idusu);
           $ps->execute();
       }
    }
?>