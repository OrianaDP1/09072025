<?php
require_once './controller/ProyectoController.php';
require_once './controller/UsuarioController.php';
require_once './controller/GrupoUsuarioController.php';
require_once './controller/ClienteController.php';

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
        case 'losgrupos':
            $controller=new GrupousuarioController();
            $controller->cargar();
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
        case 'eliminarproyecto';
            $controller=new ProyectoController();
            $controller->borrar();     
        break;
        case 'cargarclientes':
            $controller=new ClienteController();
            $controller->cargar();        
        break;
        case 'modificarcliente';
            $controller=new ClienteController();
            $controller->modificar();        
        break;
        case 'eliminarcliente';
            $controller=new ClienteController();
            $controller->borrar();        
        break;
        case 'guardarcliente';
            $controller=new ClienteController();
            $controller->guardar();          
        break;
        case 'logout':
            $controller=new UsuarioController();
            $controller->logout();      
        break;
        case 'reporteproyectos':
            $controller = new ProyectoController();
            $controller->reporteProyectosPorEmpresa();
        break;
    }
?>