<?php
	include ('../includes/sql.php');
	include ('../includes/json.php');
	$BD= new SQL();
	$JSON=new Json();
	try{
	
		$query="SELECT idServicios, Nombre FROM Servicios;";
		echo $JSON->getJson($BD->Seleccionar($query));
		$BD->Desconectar(); 
	
	}
	catch(Exeption$e){
		echo $e->getMessage();
	}
?>