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
    }
?>