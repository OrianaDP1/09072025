<?php
require_once './model/GrupoUsuarioModel.php';
require_once './helpers/verificacion.php';

class GrupoUsuarioController {
    public function cargar() {
        $model = new GrupousuarioModel();
        $grupousuarios = $model->cargar();
        $model=new UsuarioModel();
        $usuarios=$model->cargar();

        require './view/viewLosGrupos.php';
    }

    public function misGrupos() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }   
        $idusuario = $_SESSION['idusuario'] ?? null;

        if (!$idusuario) {
            header('Location: index.php?accion=login');
            exit;
        }

        $model = new GrupoUsuarioModel();
        $datos = $model->obtenerGruposConMiembrosPorUsuario($idusuario);

        // Agrupar por idgrupousuario
        $grupos = [];
        foreach ($datos as $row) {
            $id = $row['idgrupousuario'];
            if (!isset($grupos[$id])) {
                $grupos[$id] = [
                    'nombregrupo' => $row['nombregrupo'],
                    'fechacreacion' => $row['fechacreacion'],
                    'miembros' => []
                ];
            }
            $grupos[$id]['miembros'][] = [
                'nombreusuario' => $row['nombreusuario'],
                'rol' => $row['rol_en_grupo']
            ];
        }

        require './view/viewMisGrupos.php';
    }
}
