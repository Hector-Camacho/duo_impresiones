<?php
	include ("../includes/sql.php");
	include ("../includes/json.php");
	$JSON = new Json();
	$BD = new SQL();
	try{
		$query="SELECT SUM(Pedidos.Cantidad) as 'Cantidad', Servicios.Nombre as 'Servicio', SUM(Pedidos.TotalPagarServicio) as 'Total' from Pedidos INNER JOIN Servicios ON Pedidos.idServicio = Servicios.idServicios GROUP BY Servicios.Nombre";
		echo $JSON->getJson($BD->Seleccionar($query));
		$BD->Desconectar(); 
	
	}
	catch(Exeption $e){
		echo $e->getMessage();
	}
	
?>