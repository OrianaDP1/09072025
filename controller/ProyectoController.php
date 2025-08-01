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
        $clienteModel = new ClienteModel();
        $grupoModel = new GrupoUsuarioModel();
        $subtModel = new SubtproyectoModel();

        $clientes = $clienteModel->cargar();
        $grupos = $grupoModel->cargar();
        $tipoModel = new TipoproyectoModel();
        $tipos = $tipoModel->cargar(); 
        $subtproyectos = $subtModel->Cargar();

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

            header('Location: index.php?accion=cargarproyectos');
            exit;
        } else {
            $clienteModel = new ClienteModel();
            $grupoModel = new GrupoUsuarioModel();
            $subtModel = new SubtproyectoModel();

            $clientes = $clienteModel->cargar();
            $grupos = $grupoModel->cargar();
            $tipoModel = new TipoproyectoModel();
            $tipos = $tipoModel->cargar(); 
            $subtproyectos = $subtModel->Cargar();
            require __DIR__ . '/../view/viewGuardarProyecto.php';
        }
    }

    public function borrar() {
        require './helpers/verificacion.php';

        if (isset($_GET['idproyecto'])) {
            $model = new ProyectoModel();
            $model->borrar($_GET['idproyecto']);
            header('Location: index.php?accion=cargarproyectos');
            exit;
        }
    }
    public function reporteProyectosPorEmpresa() {
    $model = new ProyectoModel();
    $resultados = $model->cargarProyectosConCliente();

    $agrupado = [];

    foreach ($resultados as $fila) {
        $empresa = $fila['empresa'];
        $agrupado[$empresa]['empresa'] = $empresa;
        $agrupado[$empresa]['ruc'] = $fila['RUC'];
        $agrupado[$empresa]['contacto'] = $fila['nombres'] . ' ' . $fila['apellidos'];
        $agrupado[$empresa]['proyectos'][] = [
            'nombre' => $fila['nombre_proyecto'],
            'descripcion' => $fila['descripcion'],
            'estado' => $fila['estado'],
            'ultimaactualizacion' => $fila['ultimaactualizacion'],
            'repoGIT' => $fila['repoGIT']
        ];
    }

    require './view/viewReporteProyectosPorEmpresa.php';
}

}
?>
