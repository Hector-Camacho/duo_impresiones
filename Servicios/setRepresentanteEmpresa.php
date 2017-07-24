<?php 
	include ("../includes/sql.php");
	include ("../includes/json.php");
	$JSON = new Json();
	$SQLConexion= new SQL();
	$query="SELECT * FROM Clientes Where Clientes.ReprentanteEmpresa = 1";
	echo $JSON->getJson($SQLConexion->Seleccionar($query));
	$SQLConexion->Desconectar();
 ?>