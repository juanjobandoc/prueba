<?php
//require_once 'ModeloInterfaces.php';
class Conexion{    
    public static function conexionBD(){
        $conexion= new PDO('mysql:host=localhost;dbname=amigos', 'root', '');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
    }    
}
?>
    