<?php 
	error_reporting(E_ALL ^ E_NOTICE); 
	header('Content-type: application/json');

	extract($_POST);
	
	include_once ("../includes/sql.php");
	include_once("validacion.php");
	
	$SQLConexion= new SQL();
	$validacion= new Validacion();

	$nombreusuario = $validacion->Limpia($nombreusuario);
	$contrasena = $validacion->Limpia($contrasena);
	
	$login=$SQLConexion->Seleccionar("SELECT RolUsuario, NombreUsuario, idEmpleados FROM Usuarios WHERE NombreUsuario='$nombreusuario' AND Contrasena='$contrasena'");
	
	echo $login->RolUsuario;
	
	try
	{
		if(isset($login))
		{
			session_start();
			foreach ($login as $row)
			{			
				$_SESSION['Rol'] = $row['RolUsuario'];
				$_SESSION['Nombre'] = $row['NombreUsuario'];
				$_SESSION['idEmpleados'] = $row['idEmpleados'];
			}
			echo json_encode($validacion->Redireccion($_SESSION['Rol']));
		}
		else
		{
			echo json_encode(NULL);	
		}
	}
	catch(Exception $e)
	{
		echo json_encode(NULL);
	}
 ?>