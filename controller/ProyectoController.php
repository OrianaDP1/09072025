<?php
require_once __DIR__ . '/../model/ProyectoModel.php';
require_once __DIR__ . '/../model/ClienteModel.php';
require_once __DIR__ . '/../model/GrupoUsuarioModel.php';
require_once __DIR__ . '/../model/SubtproyectoModel.php';
require_once __DIR__ . '/../model/Proyecto.php';
require_once __DIR__ . '/../model/TipoproyectoModel.php';


class ProyectoController {

    public function cargar() {
        require './helpers/verificacion.php';

        $model = new ProyectoModel();
        $proyectos = $model->cargar();

        require __DIR__ . '/../view/viewCargarProyectos.php';
    }

    public function guardar() {
        require './helpers/verificacion.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $proyecto = new Proyecto();
            $proyecto->setNombre($_POST['nombre']);
            $proyecto->setDescripcion($_POST['descripcion']);
            $proyecto->setEstado($_POST['estado']);
            $proyecto->setUltimaactualizacion($_POST['ultimaactualizacion']);
            $proyecto->setRepoGIT($_POST['repoGIT']);
            $proyecto->setIdcliente($_POST['idcliente']);
            $proyecto->setIdgrupousuario($_POST['idgrupousuario']);
            $proyecto->setIdsubtproyecto($_POST['idsubtproyecto']);

            $model = new ProyectoModel();
            $model->guardar($proyecto);

            header('Location: index.php?accion=proyectos');
            exit;
        } else {
            // Para el formulario, cargamos las listas de datos relacionados
            $clienteModel = new ClienteModel();
            $grupoModel = new GrupoUsuarioModel();
            $subtModel = new SubtproyectoModel();

            $clientes = $clienteModel->cargar();
            $grupos = $grupoModel->cargar(); // debe existir
            $tipoModel = new TipoproyectoModel();
            $tipos = $tipoModel->cargar(); // todos los tipos de proyecto
            $subtproyectos = [];
            require __DIR__ . '/../view/viewGuardarProyecto.php';
        }
    }

    public function borrar() {
        require './helpers/verificacion.php';

        if (isset($_GET['idproyecto'])) {
            $model = new ProyectoModel();
            $model->borrar($_GET['idproyecto']);
            header('Location: index.php?accion=proyectos');
            exit;
        }
    }
}
?>
