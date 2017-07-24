<?php 

	include ("../includes/sql.php");
	include ("../includes/json.php");
	$JSON = new Json();
	$BD = new SQL();
	
	extract($_POST);
	// print_r($_POST);
	
	switch ($Accion) {
		case 'ConsultaGeneral':
			try{
				$query="SELECT Servicios.Nombre as'NombreServicio', Procesos.idProcesos, Procesos.Nombre as'NombreProceso', Procesos.Tiempo, Procesos.Rol FROM Servicios inner join Procesos_Servicios on Servicios.idServicios=Procesos_Servicios.Servicios_idServicios
						inner join Procesos on Procesos.idProcesos= Procesos_Servicios.Procesos_idProcesos  
						GROUP BY (Procesos.Nombre);";
				// $query="SELECT * FROM Procesos GROUP BY (Nombre)";
				echo $JSON->getJson($BD->Seleccionar($query));
				$BD->Desconectar(); 
			}
			catch(Exeption $e){
				echo $e->getMessage();
			}
		break;
		
		case 'NombreServicioProceso':
		// print_r($_POST);
			$query="select Servicios.Nombre, Servicios.idServicios, Procesos_Servicios.idProcesosServicios from Servicios inner join Procesos_Servicios on Servicios.idServicios=Procesos_Servicios.Servicios_idServicios
					inner join Procesos on Procesos.idProcesos= Procesos_Servicios.Procesos_idProcesos
					where Procesos.idProcesos='$_POST[idProcesos]'";
			echo $JSON->getJson($BD->Seleccionar($query));
			$BD->Desconectar();
		break;
		
		default:
			$BD->Desconectar();
		break;
	}
	
	
	
?>