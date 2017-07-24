<?php
	include ("../includes/sql.php");
	$BD = new SQL();
	extract($_POST);
	try
	{
		// $queryConsulta="SELECT count(idProcesosServicios) from Procesos_Servicios inner join Procesos on Procesos.idProcesos=ProcesosServicios.Procesos_idProcesos
		// inner join Servicios on servicios.idservicios = Procesos_Servicios.servicios_idservicios
		//  where  ";
		$query="INSERT INTO Procesos VALUES ('','$_POST[Nombre]','$_POST[Tiempo]', '$_POST[Prioridad]','$_POST[Rol]');";
		$registro=$BD->Insertar($query);
		if($registro)
		{
			$ultimo=$BD->Ultimo();
			$query="INSERT INTO Procesos_Servicios VALUES ('','$ultimo', '$_POST[Servicio]');";
			$registro=$BD->Insertar($query);
			if($registro){
				echo json_encode(array('Mensaje'=>'Se registró la información correctamente','insersion'=>true));
			}	
		}
		else
		{
			echo json_encode(array('Mensaje'=>'Este dato no pudo ser guardado!','insersion'=>false));
		}
	}
	catch(Exeption $e)
	{
		echo $e->getMessage();
	}
?>