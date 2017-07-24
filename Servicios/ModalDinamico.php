<?php
	include ("../includes/sql.php");
	include ("../includes/json.php");
	$JSON = new Json();
	$BD= new SQL();
	extract($_POST);
	try{
		$query="SELECT UnidadVenta FROM Servicios WHERE idServicios='$_POST[idServicios]'";
		echo $JSON->getJson($BD->Seleccionar($query));
		$BD->Desconectar(); 
	}catch(Exeption$e){
		$e->getMessage();
	}
?>