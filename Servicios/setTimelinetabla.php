<?php
	include ('../includes/sql.php');
	include ('../includes/json.php');
	$BD= new SQL();
	$JSON=new Json();
	try
	{
		// $query="SELECT 
		// 	    ep.FolioPedido AS 'id', s.Nombre AS 'Nombre', ep.Fecha
		// 	FROM
		// 	    Usuarios u
		// 	        INNER JOIN
		// 	    UsuariosPedidos up ON u.id = up.idUsuario
		// 	        INNER JOIN
		// 	    encabezadoPedidos ep ON up.idEncabezadoPedido = ep.id
		// 	        INNER JOIN
		// 	    Pedidos p ON ep.id = p.idEncabezado
		// 	        INNER JOIN
		// 	    servicios s ON p.idServicio = s.idServicios;";
		$query="select EncabezadoPedidos.FolioPedido as 'id', Servicios.Nombre, EncabezadoPedidos.Fecha, concat(Empleados.Nombre,' ', Empleados.ApPaterno,' ',Empleados.ApMaterno) as 'Empleado'
				from  Empleados inner join EncabezadoPedidos on EncabezadoPedidos.idEmpleado=Empleados.id
				inner join Pedidos on Pedidos.idEncabezado=EncabezadoPedidos.id
				inner join Servicios on Servicios.idServicios=Pedidos.idServicio group by EncabezadoPedidos.FolioPedido;";
		echo $JSON->getJson($BD->Seleccionar($query));
		$BD->Desconectar(); 
	}
	catch(Exeption$e)
	{
		echo $e->getMessage();
	}
?>