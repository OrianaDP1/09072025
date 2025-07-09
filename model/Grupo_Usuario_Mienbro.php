<?php
class Grupo_Usuario_Miembro {
    private $idgrupousuario;
    private $idusuario;
    private $rol_en_grupo;

    public function getIdgrupousuario() {
        return $this->idgrupousuario;
    }
    public function setIdgrupousuario($idgrupousuario) {
        $this->idgrupousuario = $idgrupousuario;
    }

    public function getIdusuario() {
        return $this->idusuario;
    }
    public function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    public function getRolEnGrupo() {
        return $this->rol_en_grupo;
    }
    public function setRolEnGrupo($rol_en_grupo) {
        $this->rol_en_grupo = $rol_en_grupo;
    }
}
?>
