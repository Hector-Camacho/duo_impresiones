<?php 
	include ("../includes/sql.php");
	include ("../includes/json.php");
	$JSON = new Json();
	$SQLConexion= new SQL();
	$query="SELECT ClaveCLiente, Nombre FROM Clientes";
	echo $JSON->getJson($SQLConexion->Seleccionar($query));
	$SQLConexion->Desconectar();
 ?>