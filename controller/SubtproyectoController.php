<?php
    require_once './model/TipoproyectoModel.php';
    class TipoproyectoController{
        public function cargarporEstado(){
            $model=new TipoproyectoModel();
            $tipoproyectos=$model->cargar();
            require_once './view/viewGuardarProyecto.php';
        }
    }
?>