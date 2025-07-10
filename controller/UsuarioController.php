<?php
    require_once './model/UsuarioModel.php';
    class UsuarioController{
        public function cargarporEstado(){
            $model=new UsuarioModel();
            $usuarios=$model->cargarporEstado();
            require_once './view/viewCargarUsuarios.php';
        }

        public function registrarse() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $usuario = new Usuario();
                $usuario->setCorreoElectronico($_POST['correo']);
                $usuario->setNombreusuario($_POST['nombreusuario']);
                $usuario->setContrasena($_POST['contrasena']);
                $usuario->setEstado(1); //no activo por defecto a

                $model = new UsuarioModel();
                $model->guardar($usuario);

                header('Location: index.php?accion=login');
            } else {
                require __DIR__ . '/../view/viewRegistrarse.php';
            }
        }

        public function borrar(){
            if(isset($_GET['idusu'])){
                $model=new ClienteModel();
                $model->borrar($_GET['idusu']);
                header('Location: index.php?accion=cargarusuarios');
            }
        }

        public function validarLogin() {
            if (session_status() === PHP_SESSION_NONE) session_start();

            // Si ya hay sesión, ir al inicio
            if (isset($_SESSION['usuario'])) {
                header('Location: index.php?accion=paginainicio');
                exit;
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nombre = $_POST['nombreusuario'] ?? '';
                $clave = $_POST['contrasena'] ?? '';

                $model = new UsuarioModel();
                $usuario = $model->validarLogin($nombre, $clave);

                if ($usuario !== null) {
                    $_SESSION['usuario'] = $usuario->getNombreusuario();
                    $_SESSION['idusuario'] = $usuario->getIdUsuario();
                    header('Location: index.php?accion=paginainicio');
                    exit;
                } else {
                    $error = "Credenciales inválidas o usuario inactivo";
                    require './view/viewLogin.php';
                }
            } else {
                require './view/viewLogin.php';
            }
        }

        public function activar() {
            session_start();

            if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'jefe') {
                header('Location: index.php?accion=login');
                exit;
            }

            if (isset($_GET['idusu'])) {
                $model = new UsuarioModel();
                $model->activarUsuario($_GET['idusu']);
                header('Location: index.php?accion=cargarusuarios');
            } else {
                echo "ID de usuario no especificado.";
            }
        }

        public function paginainicio() {
            require './helpers/verificacion.php';
            require './view/viewPaginainicio.php';
        }

        public function logout() {
            if (session_status() === PHP_SESSION_NONE) session_start();
            session_unset();
            session_destroy();
            header('Location: ../index.php?accion=login');
            exit;
        }
    }
?>