<?php  
    require_once './config/DB.php';
    require_once 'Tipoproyecto.php';

    class TipoproyectoModel{
        private $db;
        public function __construct(){
            $this->db=DB::conectar();
        }

        public function cargar(){
            $sql="select * from tipoproyecto";
            $ps=$this->db->prepare($sql);
            $ps->execute();
            $filas=$ps->fetchall();
            $tipoproyectos=array();
            foreach($filas as $f){
                $fam=new Tipoproyecto();
                $fam->setIdtipoproyecto($f[0]);
                $fam->setNombre($f[0]);
                $fam->setDescripcion($f[0]);
                array_push($tipoproyectos, $fam);
            }
            return $tipoproyectos;
        }
    }
?>