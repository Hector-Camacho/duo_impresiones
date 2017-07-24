<?php

	include ("../includes/sql.php");
	include ("../includes/json.php");
	$JSON = new Json();
	$SQLConexion= new SQL();
	try {
		$query="select sum(Pedidos.TotalPagarServicio) as TotalPagarServicio, EncabezadoPedidos.FolioPedido,ClientesTemporales.NombreCompletoCliente as 'NombreClienteT', 
				concat(Clientes.Nombre,' ', Clientes.ApellidoPaterno,' ',clientes.ApellidoMaterno) as 'NombreClienteP', 
				Servicios.Nombre, EncabezadoPedidos.FolioPedido, EncabezadoPedidos.Fecha, EncabezadoPedidos.NumeroCliente,
				ClientesTemporales.CorreoElectronico as 'CorreoT', ClientesTemporales.NumeroTelefonico as 'TelefonoT',
				Clientes.Email as 'CorreoP', Clientes.TelefonoReferencia as 'TelefonoP'
				from EncabezadoPedidos inner join Pedidos on EncabezadoPedidos.id= Pedidos.idEncabezado
				left join ClientesTemporales on ClientesTemporales.idEncabezadoPedido=EncabezadoPedidos.id
				left join Clientes on Clientes.ClaveCliente=EncabezadoPedidos.NumeroCliente
				inner join Servicios on Servicios.idServicios= Pedidos.idServicio
				left join PagosPedidos on PagosPedidos.idEncabezadoPedido=EncabezadoPedidos.id
				where EncabezadoPedidos.Finalizado='1'  
				and  not exists(select EncabezadoPedidos.id from PagosPedidos where PagosPedidos.idEncabezadoPedido=EncabezadoPedidos.id)
				group by EncabezadoPedidos.id
				order by EncabezadoPedidos.FolioPedido asc";
		echo $JSON->getJson($SQLConexion->Seleccionar($query));
	} catch (Exception $e) {
		echo $JSON->getJson(array('Mensaje'=>$e->getMessage()));
	}

 ?>