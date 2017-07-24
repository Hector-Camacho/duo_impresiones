<?php 
	include ("../includes/sql.php");
	include ("../includes/json.php");
	$JSON = new Json();
	$SQLConexion= new SQL();
	$query="SELECT * FROM Clientes INNER JOIN Direccion ON Clientes.idDireccion= Direccion.id";
	echo $JSON->getJson($SQLConexion->Seleccionar($query));
	$SQLConexion->Desconectar();
 ?>