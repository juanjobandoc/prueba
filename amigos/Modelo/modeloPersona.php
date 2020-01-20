<?php
require_once 'ModeloInterfaces.php';
class Persona implements GETSET{
    private $id;
    private $Nombre;
    private $Apellido;
    private $Sexo;
    private $FechaNacimiento;
    
    public function __GET($persona){ 
        return $this->$persona;
    }
    
    public function __SET($persona, $valor){
        return $this->$persona = $valor; 
    }       
}

class PersonaModelo implements InterfaceListar,Crud{
    private $conexion;
        
    public function __CONSTRUCT(){
            $this->conexion = Conexion::conexionBD();     
	}
	
    public function Listar(){
        $resultado = array();
        $consulta = $this->conexion->prepare("SELECT * FROM personas");
        $consulta->execute();
        foreach($consulta->fetchAll(PDO::FETCH_OBJ) as $arreglo){
            $persona = new Persona();
            $persona->__SET('id', $arreglo->id);
            $persona->__SET('Nombre', $arreglo->Nombre);
            $persona->__SET('Apellido', $arreglo->Apellido);
            $persona->__SET('Sexo', $arreglo->Sexo);
            $persona->__SET('FechaNacimiento', $arreglo->FechaNacimiento);
            $resultado[] = $persona;
            unset($persona);
        }
        return $resultado;
    }

    public function Obtener($id){
        $consulta = $this->conexion->prepare("SELECT * FROM personas WHERE id = ?");
        $consulta->execute(array($id));
        $resultado = $consulta->fetch(PDO::FETCH_OBJ);
        $persona = new Persona();
        $persona->__SET('id', $resultado->id);
        $persona->__SET('Nombre', $resultado->Nombre);
        $persona->__SET('Apellido', $resultado->Apellido);
        $persona->__SET('Sexo', $resultado->Sexo);
        $persona->__SET('FechaNacimiento', $resultado->FechaNacimiento);
        return $persona;     
    }

    public function Eliminar($id){
        $consulta = $this->conexion->prepare("DELETE FROM personas WHERE id = ?");			          
        $consulta->execute(array($id));
    }

    public function EliminarAmigo($id){
        $cadena = explode("|",$id);
        $consulta = $this->conexion->prepare("DELETE FROM amigos WHERE idpersona = ? and idamigo = ?");			          
        $consulta->execute(array($cadena[0],$cadena[1]));
        $consulta = $this->conexion->prepare("DELETE FROM amigos WHERE idpersona = ? and idamigo = ?");			          
        $consulta->execute(array($cadena[1],$cadena[0]));
    }

    public function Actualizar(Persona $dato){
        $sql = "UPDATE personas SET 
         Nombre          = ?, 
         Apellido        = ?,
         Sexo            = ?, 
         FechaNacimiento = ?
         WHERE id = ?";
         $this->conexion->prepare($sql)->execute(
         array(
             $dato->__GET('Nombre'), 
             $dato->__GET('Apellido'), 
             $dato->__GET('Sexo'),
             $dato->__GET('FechaNacimiento'),
             $dato->__GET('id')
            )
         );
    }

    public function Registrar(Persona $dato){
        $sql = "INSERT INTO personas (id,Nombre,Apellido,Sexo,FechaNacimiento) 
                    VALUES (?, ?, ?, ?, ?)";
        try{
            $this->conexion->prepare($sql)->execute(
                array(
                    $dato->__GET('id'),
                    $dato->__GET('Nombre'), 
                    $dato->__GET('Apellido'), 
                    $dato->__GET('Sexo'),
                    $dato->__GET('FechaNacimiento')
                )
            );
        }
        catch(PDOException $e){
           return 0;
        }        
    }
    
    public function RegistrarAmigo(Persona $dato,$amigosv){
        foreach($amigosv as $vamigos){
            $sql="INSERT INTO amigos(idpersona,idamigo) values (?,?)";
            $this->conexion->prepare($sql)->execute(
            array(
                $dato->__GET('id'),
                $vamigos
                )
            );            
            $this->conexion->prepare($sql)->execute(
            array(
                $vamigos,
                $dato->__GET('id')
                )
            );   
        }              
    }
    
    public function ListarxParametro($pidp){
        if($pidp!=''){
            $cadena=" where id not in ($pidp) and id>0 and id not in (
                select idAmigo from amigos where idPersona=$pidp)";
        }
        else {
            $cadena=" where id>0";
        }
        $resultado = array();
        $consulta = $this->conexion->prepare("SELECT * FROM personas".$cadena);
        $consulta->execute();
        foreach($consulta->fetchAll(PDO::FETCH_OBJ) as $arreglo){
            $persona = new Persona();
            $persona->__SET('id', $arreglo->id);
            $persona->__SET('Nombre', $arreglo->Nombre);
            $persona->__SET('Apellido', $arreglo->Apellido);
            $persona->__SET('Sexo', $arreglo->Sexo);
            $persona->__SET('FechaNacimiento', $arreglo->FechaNacimiento);
            $resultado[] = $persona;
            unset($persona);
        }
        return $resultado;
    }

    public function ListarAmigos($pidp){
        if($pidp!=''){
            $cadena=" where p.id in ($pidp)";
        }
        else {
            $cadena=" where 1=2";
        }
        $resultado = array();
        $consulta = $this->conexion->prepare("
            SELECT
                a.id codigo,
                p.id idPersona,
                p.Nombre nombrePersona,
                p.Apellido apellidoPersona,
                m.id idAmigo,
                m.Nombre nombreAmigo,
                m.Apellido apellidoAmigo,
                m.Sexo sexoAmigo,
                m.FechaNacimiento fechaNacimientoAmigo
            FROM
                personas p
                join amigos a on p.id=a.idpersona
                join personas m on m.id=a.idamigo"
                .$cadena);
        $consulta->execute();
        foreach($consulta->fetchAll(PDO::FETCH_OBJ) as $arreglo){
            $persona = new Persona();
            $persona->__SET('id', $arreglo->idAmigo);
            $persona->__SET('Nombre', $arreglo->nombreAmigo);
            $persona->__SET('Apellido', $arreglo->apellidoAmigo);
            $persona->__SET('Sexo', $arreglo->sexoAmigo);
            $persona->__SET('FechaNacimiento', $arreglo->fechaNacimientoAmigo);
            $resultado[] = $persona;
            unset($persona);
        }
        return $resultado;
    }   
}