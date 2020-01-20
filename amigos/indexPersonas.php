<?php
    require_once './Modelo/modeloPersona.php';
    require_once './Modelo/modeloConexion.php';
    require_once './Controlador/ControladorPersona.php'; 
    if ($view->disableLayout==true){
        include_once ($view->contentTemplate);
    }
    else{
        include_once ('./vista/vistaPersona.php');
    }    
?>