<?php  
    require_once './config/DB.php';
    require_once 'Subtproyecto.php';

    class SubtproyectoModel{
        private $db;
        public function __construct(){
            $this->db=DB::conectar();
        }

        public function cargarPorTipo($idtipoproyecto) {
            $sql = "SELECT idsubtproyecto, nombre FROM subtproyecto WHERE idtipoproyecto = :id";
            $ps = $this->db->prepare($sql);
            $ps->bindParam(':id', $idtipoproyecto);
            $ps->execute();
            return $ps->fetchAll(PDO::FETCH_ASSOC);
        }

        public function Cargar(){
            $sql = "SELECT * from subtproyecto";
            $ps = $this->db->prepare($sql);
            $ps->execute();
            $filas=$ps->fetchall();
            $subtproyectos=array();
            foreach($filas as $f){
                $fam=new Subtproyecto();
                $fam->setIdsubtproyecto($f[0]);
                $fam->setNombre($f[1]);
                $fam->setDescripcion($f[2]);
                $fam->setIdtipoproyecto($f[3]);
                array_push($subtproyectos, $fam);
            }
            return $subtproyectos;
        }
    }
?>