<?php
	include ("../includes/sql.php");
	$BD=new SQL();
	try
	{
		extract($_POST);
		
		$query="UPDATE Procesos inner join Procesos_Servicios on Procesos.idProcesos=Procesos_Servicios.Procesos_idProcesos 
				SET Procesos.Nombre='$_POST[NombreProcesoModal]', 
				Procesos.Tiempo='$_POST[TiempoProcesoModal]', 
				Procesos.Rol='$_POST[RolRealiza]',
				Procesos_Servicios.Servicios_idServicios='$_POST[ServiciosProcesos]'
 				WHERE Procesos.idProcesos='$_POST[IdentificadorProceso]'
				and Procesos_Servicios.idProcesosServicios='$_POST[idProcesoServicios]';";		
		$insertar=$BD->Insertar($query);
		if($insertar)
		{
			echo json_encode(array('Mensaje'=>'Se modificó la información correctamente', 'insersion'=>true));
		}
		else
		{
			echo json_encode(array('Mensaje'=>'Hubo un problema al modificar los datos!', 'insersion'=>false));
		}
	}
	catch(Exeption$e)
	{
		$e->getMessage();
	}

?>