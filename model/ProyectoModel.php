<?php  
require_once './config/DB.php';
require_once 'Proyecto.php';

class ProyectoModel {
    private $db;

    public function __construct() {
        $this->db = DB::conectar();
    }

    public function guardar(Proyecto $proyecto) {
        $sql = "INSERT INTO proyecto (nombre, descripcion, estado, ultimaactualizacion, repoGIT, idcliente, idgrupousuario, idsubtproyecto)
                VALUES (:n, :d, :e, :u, :r, :idc, :idg, :ids)";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(':n', $proyecto->getNombre());
        $ps->bindParam(':d', $proyecto->getDescripcion());
        $ps->bindParam(':e', $proyecto->getEstado());
        $ps->bindParam(':u', $proyecto->getUltimaactualizacion());
        $ps->bindParam(':r', $proyecto->getRepoGIT());
        $ps->bindParam(':idc', $proyecto->getIdcliente());
        $ps->bindParam(':idg', $proyecto->getIdgrupousuario());
        $ps->bindParam(':ids', $proyecto->getIdsubtproyecto());
        $ps->execute();
    }

    public function cargar() {
        $sql = "SELECT * FROM proyecto";
        $ps = $this->db->prepare($sql);
        $ps->execute();
        $filas = $ps->fetchAll();

        $proyectos = array();
        foreach ($filas as $f) {
            $p = new Proyecto();
            $p->setIdproyecto($f['idproyecto']);
            $p->setNombre($f['nombre']);
            $p->setDescripcion($f['descripcion']);
            $p->setEstado($f['estado']);
            $p->setUltimaactualizacion($f['ultimaactualizacion']);
            $p->setRepoGIT($f['repoGIT']);
            $p->setIdcliente($f['idcliente']);
            $p->setIdgrupousuario($f['idgrupousuario']);
            $p->setIdsubtproyecto($f['idsubtproyecto']);
            array_push($proyectos, $p);
        }

        return $proyectos;
    }

    public function borrar($idproyecto) {
        $sql = "DELETE FROM proyecto WHERE idproyecto = :idp";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(':idp', $idproyecto);
        $ps->execute();
    }

    public function cargarProyectosConCliente() {
    $sql = "SELECT 
              c.empresa, c.RUC, c.nombres, c.apellidos,
              p.nombre AS nombre_proyecto, 
              p.descripcion, 
              p.estado, 
              p.ultimaactualizacion,
              p.repoGIT
            FROM cliente c
            JOIN proyecto p ON c.idcliente = p.idcliente
            ORDER BY c.empresa, p.ultimaactualizacion DESC";

    $ps = $this->db->prepare($sql);
    $ps->execute();
    return $ps->fetchAll(PDO::FETCH_ASSOC);
    } 

}
?>
