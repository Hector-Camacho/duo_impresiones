<?php 
	include ("../includes/sql.php");
	include ("../includes/json.php");
	$JSON = new Json();
	$SQLConexion= new SQL();
	
	try {
		$query="SELECT * FROM SucursalesDuo";
		echo $JSON->getJson($SQLConexion->Seleccionar($query));
	} catch (Exception $e) {
		echo $JSON->getJson($e->getMessage());
	}


 ?>