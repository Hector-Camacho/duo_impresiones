<?php 
	include ("../includes/sql.php");
	include ("../includes/json.php");
	
	$SQLConexion= new SQL();
	$JSON= new Json();
	extract($_POST);
	try {
		switch ($TipoAccion) {
			case 'SeleccionarPedidos':
				$query="select 	Servicios.idServicios,EncabezadoPedidos.Fecha,Pedidos.id,ClientesTemporales.NombreCompletoCliente as 'NombreClienteT', concat(Clientes.Nombre,' ', Clientes.ApellidoPaterno,' ',Clientes.ApellidoMaterno) as 'NombreClienteP', 
				Servicios.Nombre, EncabezadoPedidos.FolioPedido, EncabezadoPedidos.Fecha, EncabezadoPedidos.NumeroCliente,
				ClientesTemporales.CorreoElectronico as 'CorreoT', ClientesTemporales.NumeroTelefonico as 'TelefonoT',
				Clientes.Email as 'CorreoP', Clientes.TelefonoReferencia as 'TelefonoP'
				from EncabezadoPedidos inner join Pedidos on EncabezadoPedidos.id= Pedidos.idEncabezado
				left join ClientesTemporales on ClientesTemporales.idEncabezadoPedido=EncabezadoPedidos.id
				left join Clientes on Clientes.ClaveCliente=EncabezadoPedidos.NumeroCliente
				inner join Servicios on Servicios.idServicios= Pedidos.idServicio
				where Pedidos.StatusPedido='Pendiente'
				order by EncabezadoPedidos.FolioPedido asc;";
				echo $JSON->getJson($SQLConexion->Seleccionar($query));

				$SQLConexion->Desconectar();
				break;
			case 'ConsultaPedidoSeleccionado':
				$query="SELECT 
						Servicios.Nombre as 'NombreServicio',
						concat(Pedidos.AnchoGF, 'x', Pedidos.AltoGF) as'Medidas',
						Materiales.Nombre as 'Materialutilizado',
						Pedidos.Cantidad as 'Cantidad',
						NombreProceso as 'Proceso',
						PrioridadProceso as 'Prioridad',
						Pedidos.Observaciones as 'Observaciones'
						FROM
						Pedidos
						INNER JOIN
						PrioridadProcesos ON Pedidos.id = PrioridadProcesos.Pedidos_id
						INNER JOIN
						EncabezadoPedidos ON Pedidos.idEncabezado = EncabezadoPedidos.id
						INNER JOIN 
						Servicios ON Pedidos.idServicio = Servicios.idServicios
						INNER JOIN
						Materiales ON Pedidos.idMateriales = Materiales.idMateriales
						WHERE Pedidos.id = '$_POST[FolioPedido]' order by Prioridad asc limit 1";
				echo $JSON->getJson($SQLConexion->Seleccionar($query));
				$SQLConexion->Desconectar();
				break;
			default:
				# code...
				break;
		}
		
		
	} catch (Exception $e) {
			
	}

 ?>