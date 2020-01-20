<?php
$persona = new Persona();
$modeloper = new PersonaModelo();

$view= new stdClass();
$view->disableLayout=false;
if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$persona->__SET('id',              $_REQUEST['id']);
			$persona->__SET('Nombre',          $_REQUEST['Nombre']);
			$persona->__SET('Apellido',        $_REQUEST['Apellido']);
			$persona->__SET('Sexo',            $_REQUEST['Sexo']);
			$persona->__SET('FechaNacimiento', $_REQUEST['FechaNacimiento']);
			$modeloper->Actualizar($persona);
			$modeloper->RegistrarAmigo($persona,$_REQUEST['amigo']);
			header('Location: indexPersonas.php');
			break;

		case 'registrar':
            $persona->__SET('id',              $_REQUEST['id']);
            $persona->__SET('Nombre',          $_REQUEST['Nombre']);
			$persona->__SET('Apellido',        $_REQUEST['Apellido']);
			$persona->__SET('Sexo',            $_REQUEST['Sexo']);
			$persona->__SET('FechaNacimiento', $_REQUEST['FechaNacimiento']);
			$modeloper->Registrar($persona);
			$modeloper->RegistrarAmigo($persona,$_REQUEST['amigo']);
			header('Location: indexPersonas.php');
			break;
			

		case 'eliminar':
			$modeloper->Eliminar($_REQUEST['id']);
			header('Location: indexPersonas.php');
			break;
		
		case 'eliminaramigo':
			$modeloper->EliminarAmigo($_REQUEST['id']);
			header('Location: indexPersonas.php');
			break;

		case 'editar':
			$persona = $modeloper->Obtener($_REQUEST['id']);			
			break;
	}
}