<?php
require_once './model/ClienteModel.php';
require_once './helpers/verificacion.php';

class ClienteController {

    public function cargar() {
        $model = new ClienteModel();
        $clientes = $model->cargar();
        require './view/viewCargarClientes.php';
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cliente = new Cliente();
            $cliente->setEmpresa($_POST['empresa']);
            $cliente->setRUC($_POST['ruc']);
            $cliente->setNombres($_POST['nombres']);
            $cliente->setApellidos($_POST['apellidos']);
            $cliente->setDni($_POST['dni']);
            $cliente->setNumerotel($_POST['numerotel']);
            $cliente->setNacionalidad($_POST['nacionalidad']);
            $cliente->setCreadordecliente($_POST['creadordecliente']);
            $cliente->setUltimocontrato($_POST['ultimocontrato']);
            $cliente->setEncontrato($_POST['encontrato']);

            $model = new ClienteModel();
            $model->guardar($cliente);

            header('Location: index.php?accion=cargarclientes');
        } else {
            require './view/viewGuardarCliente.php';
        }
    }

    public function borrar() {
        if (isset($_GET['idcli'])) {
            $model = new ClienteModel();
            $model->borrar($_GET['idcli']);
            header('Location: index.php?accion=cargarclientes');
        } else {
            echo "ID de cliente no especificado.";
        }
    }
}
