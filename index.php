<?php
//    require_once './controller/FamiliaController.php';
//    require_once './controller/CategoriaController.php';
    require_once './controller/UsuarioController.php';
    $accion=isset($_GET['accion'])?$_GET['accion']:'cargarusuarios';
    switch($accion){
        case 'cargarusuarios':
            $controller=new UsuarioController();
            $controller->cargar();
        break;
        case 'guardarusuario':
            $controller=new UsuarioController();
            $controller->guardar();
        break;
    }
?>