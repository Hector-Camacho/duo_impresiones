<?php
	include ('../includes/sql.php');
	include ('../includes/json.php');
	$BD= new SQL();
	$JSON=new Json();
	extract($_POST);
	// print_r($_POST);
	try
	{
		// print_r($_POST['Proceso']);
		$Proceso="SELECT Rol AS 'rol' from Procesos where Nombre='$_POST[Proceso]'";
		$Consulta=$BD->Seleccionar($Proceso);
		// print_r($Consulta);
		if($Consulta)
		{
			
			$Rol=$Consulta[0];
			// print_r($Consulta);
			$query="SELECT 
				    Usuarios.id,
				    CONCAT(Nombre, ' ', ApPaterno, ' ') AS 'Nombre'
				FROM
				    Usuarios
				        INNER JOIN
				    Empleados ON Usuarios.idEmpleados = Empleados.id
				WHERE
				    Usuarios.RolUsuario = '$Rol[rol]'";
			echo $JSON->getJson($BD->Seleccionar($query));
		}
		else
		{
			echo "Sin resultados";
		}
		$BD->Desconectar(); 
	}
	catch(Exeption$e){
		echo $e->getMessage();
	}
?>