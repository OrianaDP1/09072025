<?php
require_once './controller/ProyectoController.php';
require_once './controller/UsuarioController.php';
require_once './controller/GrupoUsuarioController.php';

    $accion=isset($_GET['accion'])?$_GET['accion']:'login';
    switch($accion){

        case 'login':
            $controller=new UsuarioController();
            $controller->validarLogin();
        break;
        case 'registrarse':
            $controller=new UsuarioController();
            $controller->registrarse();
        break;
        case 'misgrupos':
            $controller=new GrupousuarioController();
            $controller->misGrupos();
        break;
        case 'paginainicio':
            $controller=new UsuarioController();
            $controller->paginainicio();        
        break;
        case 'cargarproyectos':
            $controller=new ProyectoController();
            $controller->cargar();        
        break;
        case 'guardarproyecto':
            $controller=new ProyectoController();
            $controller->guardar();        
        break;
        case 'cargarclientes':
            $controller=new ClienteController();
            $controller->guardar();        
        break;
        case 'logout':
            $controller=new UsuarioController();
            $controller->logout();      
        break;
    }
?>