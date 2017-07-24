<?php 
	include ("../includes/sql.php");
	include ("../includes/json.php");
	$JSON = new Json();
	$SQLConexion= new SQL();
	$ArregloFinal=array();
	extract($_POST);
	switch ($Accion) {
		case 'ConsultaTabla':
			$query="select EncabezadoPedidos.FolioPedido as 'Folio', Pedidos.NombreArchivo as 'Imagen', Pedidos.id as 'idPedido', Servicios.idServicios, UsuariosPedidos.FechaDeAsignacion,
				Pedidos.Cantidad, Materiales.Nombre, concat(Pedidos.AnchoGF,' X ',Pedidos.AltoGF) as'Medidas',
				Servicios.Nombre as 'NombreServicio', PrioridadProcesos.NombreProceso as 'NombreProceso',
				idPrioridadesServiciosPedido as 'IdPrioServPed', prioridadproceso as 'prioridad' from 
				Pedidos inner join Materiales on Pedidos.idMateriales=Materiales.idMateriales
				inner join Servicios on Servicios.idServicios=Pedidos.idServicio
				inner join PrioridadProcesos on PrioridadProcesos.Pedidos_id=Pedidos.id
				inner join UsuariosPedidos on UsuariosPedidos.Pedidos_id=Pedidos.id
				inner join Usuarios on Usuarios.id= UsuariosPedidos.idUsuario
				inner join Empleados on Empleados.id=Usuarios.idEmpleados
				inner join Procesos on PrioridadProcesos.NombreProceso=Procesos.Nombre
				inner join EncabezadoPedidos on EncabezadoPedidos.id=Pedidos.idEncabezado 
				where Pedidos.StatusPedido='En proceso' 
				and PrioridadProcesos.Estatus='Pendiente' 
				and UsuariosPedidos.statusPedido=0
				and Procesos.Rol='Gran Formato'
				AND Servicios.Nombre='Gran Formato'
				group by Pedidos.AnchoGF, Pedidos.AltoGF, PrioridadProcesos.NombreProceso, Pedidos.idEncabezado;
				";
				$Pedidos=$SQLConexion->Seleccionar($query);
				foreach ($Pedidos as $Pedido ) {
					if ($Pedido['prioridad']=='1') {
			         		array_push($ArregloFinal, $Pedido);
			        }
			        else{
						$queryverificar="SELECT IF(EXISTS( SELECT * from ProcesosOrdenados where estatus='Finalizado'
											 and ProcesosOrdenados.idPrioridadesServiciosPedido = 
										    (SELECT idPrioridadesServiciosPedido FROM prioridadprocesos WHERE prioridadproceso < '$Pedido[prioridad]' AND pedidos_id  = '$Pedido[idPedido]'
			             					ORDER BY idPrioridadesServiciosPedido ASC LIMIT 1)),'Finalizado','Pendiente') as estatus;";
			             			$status=$SQLConexion->Seleccionar($queryverificar);
			         if($status[0]['estatus']=='Finalizado')
			         {
			         	array_push($ArregloFinal, $Pedido);
			         }
			        }
				}
				echo $JSON->getJson($ArregloFinal);
			    $SQLConexion->Desconectar();
			break;
		case 'ConsultaProcesoServicios':
		$query="SELECT PrioridadProcesos.NombreProceso from Pedidos
										inner join EncabezadoPedidos on EncabezadoPedidos.id=Pedidos.idEncabezado
										inner join Servicios on Servicios.idServicios=Pedidos.idServicio
										inner join PrioridadProcesos on PrioridadProcesos.Pedidos_id=Pedidos.id
										where Servicios.idServicios='$idSer' and Pedidos.id='$idE';";
						echo $JSON->getJson($SQLConexion->Seleccionar($query));
						$SQLConexion->Desconectar();
			break;
		case 'CambiarStatusPedidoServicio':
		try {
			//NECESITAMOS MANDAR EL ID DE PRIORIDAD PROCESOS PARA PODER FINALIZAR UN SOLO PROCESOS INDEPENDIENTEMENTE DEL PEDIDO, PORQUE SI NO LO HACEMOS, SE FINALIZA A LA SHIT TODO, OSEA, LO QUE SEA DE ESE PEDIDO Y PUES NO. NO VALE ASI, DON'T MAMEMOS.
			$query="UPDATE prioridadprocesos 
					SET 
						estatus = 'Finalizado'
					WHERE
						PrioridadProcesos.idPrioridadesServiciosPedido ='$_POST[EncabezadoElegido]'";
			$Cambio=$SQLConexion->Insertar($query);
			if($Cambio){
				echo json_encode(array("Mensaje"=>"Se ha finalizado Este Pedido", "Insersion"=>true));
			}
			else{
				echo json_encode(array("Mensaje"=>"Ocurrió un error al cambiar el estado del pedido", "Insersion"=>false));
			}
		} catch (Exception $e) {
			echo json_encode(array("Mensaje"=>"Esto es inesperado "+ $e->getMessage(), "Insersion"=>false));
					
		}	
			break;
		
		default:
			
			break;
	}
 ?>