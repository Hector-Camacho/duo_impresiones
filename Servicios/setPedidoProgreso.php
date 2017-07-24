<?php
	include ('../includes/sql.php');
	include ('../includes/json.php');
	$BD= new SQL();
	$JSON=new Json();
	extract($_POST);
	// print_r($_POST);
	try{
		$query="select * from  Pedidos inner join PrioridadProcesos on Pedidos.id=PrioridadProcesos.Pedidos_id
				inner join EncabezadoPedidos on EncabezadoPedidos.id=Pedidos.idEncabezado
				where EncabezadoPedidos.FolioPedido='$_POST[id]' order by PrioridadProcesos.PrioridadProceso; ";
				echo $JSON->getJson($BD->Seleccionar($query));
		$BD->Desconectar(); 
	}
	catch(Exeption$e){
		echo $e->getMessage();
	}
?>
