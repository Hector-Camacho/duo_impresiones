<?php
	include ("../includes/sql.php");
	include ("../includes/json.php");
	$JSON = new Json();
	$BD = new SQL();
	try{
		$query="SELECT idServicios, Nombre FROM Servicios";
		echo $JSON->getJson($BD->Seleccionar($query));
		$BD->Desconectar(); 
	}
	catch(Exeption $e){
		echo $e->getMessage();
	}


?>
