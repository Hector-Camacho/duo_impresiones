<?php 
	include ("../includes/json.php");
	include ("../includes/sql.php");	
	$MySQLConexion = new SQL();
	$JSON = new Json();
	$ArregloFinal=array();
		switch ($_POST['Accion']) {
			case 'ConsultaGeneral':
				$query="select EncabezadoPedidos.FolioPedido as 'Folio', NombreArchivo as 'Imagen',Pedidos.id as 'idPedido', Servicios.idServicios, UsuariosPedidos.FechaDeAsignacion,
				Pedidos.Cantidad, Materiales.Nombre, concat(Pedidos.AnchoGF,' X ',Pedidos.AltoGF) as'Medidas',
				Servicios.Nombre as 'NombreServicio', PrioridadProcesos.NombreProceso as 'NombreProceso',
				idPrioridadesServiciosPedido as 'IdPrioServPed',  prioridadproceso as 'prioridad'  from 
				Pedidos inner join Materiales on Pedidos.idMateriales=Materiales.idMateriales
				inner join Servicios on Servicios.idServicios=Pedidos.idServicio
				inner join PrioridadProcesos on PrioridadProcesos.Pedidos_id=Pedidos.id
				inner join UsuariosPedidos on UsuariosPedidos.Pedidos_id=Pedidos.id
				inner join Usuarios on Usuarios.id= UsuariosPedidos.idUsuario
				inner join Empleados on Empleados.id=Usuarios.idEmpleados
				inner join Procesos on PrioridadProcesos.NombreProceso=Procesos.Nombre
				inner join EncabezadoPedidos on EncabezadoPedidos.id=Pedidos.idEncabezado
				where PrioridadProcesos.Estatus='Pendiente' 
				and UsuariosPedidos.statusPedido=0
				and Procesos.Rol='Diseño'
				group by PrioridadProcesos.NombreProceso, Pedidos.idEncabezado;";
				$Pedidos=$MySQLConexion->Seleccionar($query);
				foreach ($Pedidos as $Pedido ) {
					if ($Pedido['prioridad']=='1') {
			         		array_push($ArregloFinal, $Pedido);
			        }
			        else{
						$queryverificar="SELECT IF(EXISTS( SELECT * from ProcesosOrdenados where estatus='Finalizado'
											 and ProcesosOrdenados.idPrioridadesServiciosPedido = 
										    (SELECT idPrioridadesServiciosPedido FROM prioridadprocesos WHERE prioridadproceso < '$Pedido[prioridad]' AND pedidos_id  = '$Pedido[idPedido]'
			             					ORDER BY idPrioridadesServiciosPedido ASC LIMIT 1)),'Finalizado','Pendiente') as estatus;";
			             			$status=$MySQLConexion->Seleccionar($queryverificar);
			         if($status[0]['estatus']=='Finalizado')
			         {
			         	array_push($ArregloFinal, $Pedido);
			         }
			         else
			         {
			         	
			         }
			        }
			}
				echo $JSON->getJson($ArregloFinal);
				$MySQLConexion->Desconectar();
				break;
			case 'ConsultaProcesoServicios':
			extract($_POST);
				$query="SELECT PrioridadProcesos.NombreProceso from Pedidos
										inner join EncabezadoPedidos on EncabezadoPedidos.id=Pedidos.idEncabezado
										inner join Servicios on Servicios.idServicios=Pedidos.idServicio
										inner join PrioridadProcesos on PrioridadProcesos.Pedidos_id=Pedidos.id
										where Servicios.idServicios='$idSer' and Pedidos.id='$idE';";
						echo $JSON->getJson($MySQLConexion->Seleccionar($query));
						$MySQLConexion->Desconectar();
				break;
			case 'CambiarStatusPedidoServicio':
				echo json_encode(array("Mensaje"=>"Se ha finalizado Este Pedido", "Insersion"=>true));
				if($_POST['NuevaImagen']==""){
					$query="update Pedidos inner join PrioridadProcesos
							on Pedidos.id= PrioridadProcesos.Pedidos_id
							inner join Servicios on Servicios.idServicios=Pedidos.idServicio
							inner join UsuariosPedidos on UsuariosPedidos.Pedidos_id=Pedidos.id
							set PrioridadProcesos.estatus='Finalizado'
							where PrioridadProcesos.idPrioridadesServiciosPedido='$_POST[EncabezadoElegido]'";
					$Cambio=$MySQLConexion->Insertar($query);
				}
				else{
					
					$query="update Pedidos inner join PrioridadProcesos
							on Pedidos.id= PrioridadProcesos.Pedidos_id
							inner join Servicios on Servicios.idServicios=Pedidos.idServicio
							inner join UsuariosPedidos on UsuariosPedidos.Pedidos_id=Pedidos.id
							set PrioridadProcesos.estatus='Finalizado',
							Pedidos.NombreArchivo='$_POST[NuevaImagen]'
							where PrioridadProcesos.idPrioridadesServiciosPedido='$_POST[EncabezadoElegido]'";
					$Cambio=$MySQLConexion->Insertar($query);
				}
				if($Cambio){
					echo json_encode(array("Mensaje"=>"Se ha finalizado Este Pedido", "Insersion"=>true));
				}
				else{
					echo json_encode(array("Mensaje"=>"Ocurrió un error al cambiar el estado del pedido", "Insersion"=>false));
				}
				$MySQLConexion->Desconectar();				
				break;
				default:
					$MySQLConexion->Desconectar();				
				break;		
			}
			
?>