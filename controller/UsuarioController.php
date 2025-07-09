<?php
    require_once './model/UsuarioModel.php';
    class UsuarioController{
        public function cargar(){
            $model=new UsuarioModel();
            $usuarios=$model->cargar();
            require_once './view/viewCargarUsuarios.php';
        }

        public function guardar(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $model=new UsuarioModel();
                $cliente=new Usuario();
                $cliente->setCorreoElectronico($_POST['txtCor']);
                $cliente->setNombreusuario($_POST['txtNom']);
                $cliente->setContrasena($_POST['txtCon']);
                $cliente->setEstado($_POST['txtEst']);
                $model->guardar($cliente);
                header('Location: index.php');
            }
            else{
                require_once './view/viewGuardarUsuario.php';
            }
        }

        public function borrar(){
            if(isset($_GET['idusu'])){
                $model=new ClienteModel();
                $model->borrar($_GET['idusu']);
                header('Location: index.php?accion=cargarusuarios');
            }
        }
    }
?>