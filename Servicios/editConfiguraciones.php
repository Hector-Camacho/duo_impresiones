<?php
	include ("../includes/sql.php");
	$BD=new SQL();
	extract($_POST);
	try
	{
		$query="UPDATE Configuraciones INNER JOIN ConfiguracionesServicios
		ON Configuraciones.idConfiguraciones=ConfiguracionesServicios.Configuraciones_idConfiguraciones
		INNER JOIN Servicios on Servicios.idServicios= ConfiguracionesServicios.Servicios_idServicios
		SET Configuraciones.Nombre='$_POST[Nombre]', Configuraciones.Tiempo='$_POST[Tiempo]', ConfiguracionesServicios.Servicios_idServicios='$_POST[Servicio]'
		WHERE idConfiguraciones='$_POST[Id]'";
		$insertar=$BD->Insertar($query);
		if($insertar)
		{
			echo json_encode(array('Mensaje'=>'Se modificó la información correctamente','insersion'=>true));
		}
		else
		{
			echo json_encode(array('Mensaje'=>'Hubo un problema al modificar el dato!','insersion'=>false));
		}
	}
	catch(Exeption$e)
	{
		$e->getMessage();
	}

?>