<?php
	include('../includes/sql.php');
	extract($_POST);
	$BD= new SQL();
	try
	{
		$query="INSERT INTO configuraciones VALUES ('','$_POST[Nombre]', '$_POST[Tiempo]')";
		$Insertar=$BD->Insertar($query);
		if($Insertar)
		{
			$ultimo=$BD->Ultimo();
			$query="INSERT INTO configuracionesservicios VALUES ('','$ultimo', '$_POST[Servicio]');";
			$Insertar=$BD->Insertar($query);
			if($Insertar)
			{
				echo json_encode(array('Mensaje'=>'Se registró la información correctamente'));
			}
			else
			{
				echo json_encode(array('Mensaje'=>'Se guardaron solo algunos datos, esto puede comprometer la informacion del sistema. Favor de llamar al administrador'));
			}
		}
		else
		{
			echo "No inserto";
		}
	}
	catch(Exeption $e)
	{
		echo $e->getMessage();
	}
  ?>