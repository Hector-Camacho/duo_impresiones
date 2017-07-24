<?php 
	include ("../includes/sql.php");
	include ("../includes/json.php");
	$JSON = new Json();
	$SQLConexion= new SQL();
	$ArregloFinal=array();
	extract($_POST);
	switch ($Accion) {
		case 'ConsultaGeneral':
			try {
				$query="select EncabezadoPedidos.FolioPedido as 'Folio', Pedidos.id as 'idPedido', Servicios.idServicios, UsuariosPedidos.FechaDeAsignacion,
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
				where Pedidos.StatusPedido='En Proceso' 
				and PrioridadProcesos.Estatus='Pendiente' 
				and UsuariosPedidos.statusPedido=0
				and Procesos.Rol='Acabados'
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
					/*$ConsultaProceso= "SELECT 
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
	              }*/
				}
				echo $JSON->getJson($ArregloFinal);
			} catch (Exception $e) {
				echo $JSON->getJson(array('Mensaje'=>$e->getMessage(),'Insercion'=>false));
			}
			break;
		case 'ConsultaProcesoServicio':
		// extract($_POST);
			try {
				$query="SELECT PrioridadProcesos.NombreProceso from Pedidos
											inner join EncabezadoPedidos on EncabezadoPedidos.id=Pedidos.idEncabezado
											inner join Servicios on Servicios.idServicios=Pedidos.idServicio
											inner join PrioridadProcesos on PrioridadProcesos.Pedidos_id=Pedidos.id
											where Servicios.idServicios='$idSer' and Pedidos.id='$idE';";
							echo $JSON->getJson($SQLConexion->Seleccionar($query));
							$SQLConexion->Desconectar();
			} catch (Exception $e) {
				echo $JSON->getJson(array('Mensaje'=>$e->getMessage(),'Insercion'=>false));	
				
			}
			break;
		case 'CambiarStatusPedidoServicio':
			try {
			$query="UPDATE prioridadprocesos 
					SET 
						estatus = 'Finalizado'
					WHERE
						PrioridadProcesos.idPrioridadesServiciosPedido = '$_POST[idPrioridadServicio]'
";
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
		default:
			$SQLConexion->Desconectar();
			break;
	}
 ?>