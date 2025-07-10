
<?php  
    require_once './config/DB.php';
    require_once 'Grupousuario.php';

    class GrupousuarioModel{
        private $db;
        public function __construct(){
            $this->db=DB::conectar();
        }

    public function obtenerGruposConMiembrosPorUsuario($idusuario) {
        $sql = "SELECT g.idgrupousuario, g.nombregrupo, g.fechacreacion, u.nombreusuario, gm.rol_en_grupo FROM grupousuario g INNER JOIN grupo_usuario_miembro gm ON g.idgrupousuario = gm.idgrupousuario INNER JOIN usuario u ON gm.idusuario = u.idusuario WHERE g.idgrupousuario IN (SELECT idgrupousuario FROM grupo_usuario_miembro WHERE idusuario = :id) AND g.estado = 0 ORDER BY g.idgrupousuario, u.nombreusuario";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(':id', $idusuario);
        $ps->execute();
        return $ps->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cargar(){
        $sql= "SELECT * FROM grupousuario";
        $ps=$this->db->prepare($sql);
        $ps->execute();
        $filas=$ps->fetchall();
        $grupousuarios=array();
        foreach($filas as $f){
            $fam=new Grupousuario();
            $fam->setIdgrupousuario($f[0]);
            $fam->setNombregrupo($f[1]);
            $fam->setEstado($f[2]);
            $fam->setFechacreacion($f[3]);
            $fam->setIdencargado($f[4]);
            array_push($grupousuarios, $fam);
        }
        return $grupousuarios;
    }
}
?>
