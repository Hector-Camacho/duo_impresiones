<?php
	include ("../includes/sql.php");
	include ("../includes/json.php");
	$JSON = new Json();
	$BD = new SQL();
	extract($_POST);
	switch ($NombreFuncion) {
		case 'MostrarServPedido':
			$query="SELECT * FROM Servicios where estatusHab='Activo';";
			echo $JSON->getJson($BD->Seleccionar($query));
			$BD->Desconectar();
		break;
		case 'ModificarServicios':
			$query="SELECT * FROM Servicios;";
			echo $JSON->getJson($BD->Seleccionar($query));
			$BD->Desconectar();
		break;
		default:
			# code...
			break;
	}
	

?>