<?php 
	include ("../includes/sql.php");
	include ("../includes/json.php");
	$JSON = new Json();
	$SQLConexion= new SQL();
	extract($_POST);
	switch ($Accion) {
		case 'ConsultaGeneralOffset':
			try {
				$query="select EncabezadoPedidos.FolioPedido as 'Folio', Pedidos.NombreArchivo as 'Imagen', Pedidos.id as 'idPedido', Servicios.idServicios, UsuariosPedidos.FechaDeAsignacion,
				Pedidos.Cantidad, Materiales.Nombre, concat(Pedidos.AnchoGF,' X ',Pedidos.AltoGF) as'Medidas',
				Servicios.Nombre as 'NombreServicio', PrioridadProcesos.NombreProceso as 'NombreProceso' from 
				Pedidos inner join Materiales on Pedidos.idMateriales=Materiales.idMateriales
				inner join Servicios on Servicios.idServicios=Pedidos.idServicio
				inner join PrioridadProcesos on PrioridadProcesos.Pedidos_id=Pedidos.id
				inner join UsuariosPedidos on UsuariosPedidos.Pedidos_id=Pedidos.id
				inner join Usuarios on Usuarios.id= UsuariosPedidos.idUsuario
				inner join Empleados on Empleados.id=Usuarios.idEmpleados
				inner join Procesos on PrioridadProcesos.NombreProceso=Procesos.Nombre
				inner join EncabezadoPedidos on EncabezadoPedidos.id=Pedidos.idEncabezado 
				where Pedidos.StatusPedido='En Proceso' 
				and PrioridadProcesos.Estatus='Pendiente' 
				and UsuariosPedidos.statusPedido=0
				and Procesos.Rol='Offset'
				group by Pedidos.AnchoGF, Pedidos.AltoGF, PrioridadProcesos.NombreProceso, Pedidos.idEncabezado;
				";
				$arrayEquis=$SQLConexion->Seleccionar($query);
				foreach ($arrayEquis as $Arreglo ) {
					$ConsultaProceso= "SELECT 
						NombreProceso as 'Proceso',
						PrioridadProceso as 'Prioridad'
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
						WHERE Pedidos.id = $Arreglo[idPedido] order by Prioridad asc limit 1;";
						$ProcesoPrioridad=$SQLConexion->Seleccionar($ConsultaProceso);
						//Aqui esta el primer proceso del pedido
						$PrimerProceso=$ProcesoPrioridad[0]['Proceso'];
						$ProcesoPedido=$Arreglo['NombreProceso'];
						//Si el primer proceso del pedido es igual al proceso del arreglo que se esta iterando dentro del foreach, se empuja al arreglo que se mkostrara en la tabla
						if ($PrimerProceso==$ProcesoPedido) {
							array_push($a, $Arreglo);
						}
					$query="SELECT IF( EXISTS( SELECT * FROM prioridadprocesos
		             WHERE `estatus` =  'Finalizado' AND idPrioridadesServiciosPedido =	
					 (SELECT idPrioridadesServiciosPedido FROM prioridadprocesos WHERE idPrioridadesServiciosPedido < '$Arreglo[IdPrioServPed]' 
	             	ORDER BY idPrioridadesServiciosPedido DESC LIMIT 1)), 'Finalizado', 'NoFinalizado') as 'Estatus';";
	              $Arr=$SQLConexion->Seleccionar($query);
	              if ($Arr[0]['Estatus']=='Finalizado') {
	              	array_push($a, $Arreglo);
	              }
				}
				echo $JSON->getJson($a);
			} catch (Exception $e) {
				echo $JSON->getJson(array('Mensaje' => 'Error'.$e->getMessage()));
			}
			break;
		
		
		case 'CambiarStatusPedido':
		try {
			$query="update Pedidos inner join PrioridadProcesos
					on Pedidos.id= PrioridadProcesos.Pedidos_id
					inner join Servicios on Servicios.idServicios=Pedidos.idServicio
					inner join UsuariosPedidos on UsuariosPedidos.Pedidos_id=Pedidos.id
					set PrioridadProcesos.estatus='Finalizadoo',
					UsuariosPedidos.statusPedido=1
					where PrioridadProcesos.Pedidos_id='$_POST[PedidoSele]' 
					and Servicios.idServicios='$_POST[ServicioSele]';";
			$Cambio=$SQLConexion->Insertar($query);
			if($Cambio){
				echo $JSON->getJson(array('Mensaje'=>'Pedido Finalizado exitosamente','Insercion'=>true));
			}
			else{
				echo $JSON->getJson(array('Mensaje'=>'Ha ocurrido un error','Insercion'=>false));
			}
			
		} catch (Exception $e) {
				echo $JSON->getJson(array('Mensaje'=>$e->getMessage(),'Insercion'=>false));	
		}
			break;
		case 'ConsultaProcesoServicio':
			$query="SELECT PrioridadProcesos.NombreProceso from Pedidos
										inner join EncabezadoPedidos on EncabezadoPedidos.id=Pedidos.idEncabezado
										inner join Servicios on Servicios.idServicios=Pedidos.idServicio
										inner join PrioridadProcesos on PrioridadProcesos.Pedidos_id=Pedidos.id
										where Servicios.idServicios='$idSer' and Pedidos.id='$idP';";
						echo $JSON->getJson($SQLConexion->Seleccionar($query));
						$SQLConexion->Desconectar();
			break;
		case 'ProcesosServicioPedidos':
				$query="SELECT group_concat(NombreProceso ORDER BY NombreProceso ASC SEPARATOR ', ') NombreProceso from(
										SELECT PrioridadProcesos.NombreProceso from Pedidos
										inner join EncabezadoPedidos on EncabezadoPedidos.id=Pedidos.idEncabezado
										inner join Servicios on Servicios.idServicios=Pedidos.idServicio
										inner join PrioridadProcesos on PrioridadProcesos.Pedidos_id=Pedidos.id
										where Servicios.idServicios='$idSer' and Pedidos.id='$idP') 
							AS TablaProceso;";
				echo $JSON->getJson($SQLConexion->Seleccionar($query));
				$SQLConexion->Desconectar();
			break;
		default:
			$SQLConexion->Desconectar();
			break;
	}


 ?>