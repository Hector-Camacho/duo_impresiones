<?php 
	include ("../includes/sql.php");
	include ("../includes/json.php");
	$JSON = new Json();
	$SQLConexion= new SQL();
	extract($_POST);
	switch ($Accion) {
		case 'GenerarChecks':
			try{
				$query="SELECT 
				  Procesos.NivelPrioridad AS 'nivelprioridad', Procesos.Nombre AS 'nombre', Procesos.idProcesos, Procesos.Tiempo
				FROM
				   Procesos_Servicios
				        INNER JOIN
				    Servicios
				        INNER JOIN
				    Procesos ON Procesos_Servicios.Servicios_idServicios = '$_POST[idServicios]'
				        AND Procesos_Servicios.Procesos_idProcesos = Procesos.idProcesos GROUP BY (Procesos.nombre)";
			echo $JSON->getJson($SQLConexion->Seleccionar($query));
			}
			catch(Exeption $e){

			}
			break;
		case 'TiempoProceso':
			$query="select * from Procesos where Procesos.idProcesos='$_POST[idProceso]';";
			echo $JSON->getJson($SQLConexion->Seleccionar($query));
		
			break;
		
		default:
			# code...
			break;
	}
	
	
	
 ?>