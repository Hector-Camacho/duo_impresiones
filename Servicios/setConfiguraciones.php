<?php
	include ("../includes/sql.php");
	include ("../includes/json.php");
	$JSON = new Json();
	$BD = new SQL();
	try{
		$query="SELECT  Servicios.Nombre AS 'NombreServicio',Configuraciones.Nombre, Configuraciones.Tiempo,Configuraciones.idConfiguraciones FROM Configuraciones 
		INNER JOIN ConfiguracionesServicios 
		ON Configuraciones.idConfiguraciones=ConfiguracionesServicios.Configuraciones_idConfiguraciones
		INNER JOIN Servicios on Servicios.idServicios= ConfiguracionesServicios.Servicios_idServicios";
		echo $JSON->getJson($BD->Seleccionar($query));
		$BD->Desconectar(); 
	
	}
	catch(Exeption $e){
		echo $e->getMessage();
	}
	
?>