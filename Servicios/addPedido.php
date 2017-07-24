<?php
	include ("../includes/sql.php");
	include ("../includes/json.php");
	extract($_POST);
	$JSON = new Json();
	$BD= new SQL();
	function Fecha()
	{
		date_default_timezone_set("America/Chihuahua");
		$hoy = date("Y-m-d ");
		return $hoy;
	}
	function token($length) {
		// Parametros para el token que voy a generar
		$keychars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		// Generador del token
		$randkey = "";
		$max=strlen($keychars)-1;
		for ($i=0;$i<$length;$i++) {
			$randkey .= substr($keychars, rand(0, $max), 1);
		}
		return $randkey;
	}
	try 
	{
		switch ($NombreFuncion) 
		{
			case 'Folio':
				$query="SELECT FolioPedido+1 as 'FolioPedido' FROM encabezadopedidos order by FolioPedido desc limit 1";
				$Folios=$BD->Seleccionar($query);
				$identEnc="select id+1 as 'id' from encabezadopedidos order by id desc limit 1";
				$EncabezadoPedidos=$BD->Seleccionar($identEnc); 
				if($Folios!=null && $EncabezadoPedidos!=null){
					echo  $JSON->getJson(array('Folios'=>$Folios,'id'=>$EncabezadoPedidos));
				}
				else{
					echo  $JSON->getJson(array('FolioPedido'=>1,'id'=>1));
				}
				$BD->Desconectar();
			break;
			case 'SumaConfiguracionTiempo':
			$query="select sum(Tiempo) as 'Tiempo' from configuraciones inner join configuracionesservicios
					on configuracionesservicios.Configuraciones_idConfiguraciones=configuraciones.idConfiguraciones
					inner join servicios on servicios.idServicios=configuracionesservicios.Servicios_idServicios
					where idServicios=$idServicioElegido;";
				$SumaTiempos=$BD->Seleccionar($query);
				if($SumaTiempos!=null){
					echo  $JSON->getJson($SumaTiempos);
				}
				else{
					echo  $JSON->getJson(array('id'=>0));
				}
				$BD->Desconectar();
			break;
			case 'RegistroCliente':
				extract($Pedido);
				extract($Cliente);
				$query="call InsertarClientesEncabezado('$Accion',$Pedido[FolioPedido],$Pedido[NumeroCliente],
														$Pedido[idEmpleado],'$Cliente[Nombre]','$Cliente[Telefono]',
														'$Cliente[Email]') ";
// print_r($query);
				$Insertar=$BD->Seleccionar($query);
				if($Insertar)
				{
						echo json_encode(array('Mensaje'=>'Se guardo correctamente la informacion del pedido, puede continuar', 'Insertar'=>true));
				}else{
						echo json_encode(array('Mensaje'=>'Ocurrio un problema, favor de contactar al administrador del sistema', 'Insertar'=>false));	
				}
			break;
			case 'Guardar':
				extract($Pedido);
				$query="call GuardarPedido($Pedido[idServicio],$Pedido[idEncabezado],$Pedido[Cantidad],
											'$Pedido[Observaciones]',$Pedido[Total],$Pedido[idMaterial],
											$Pedido[AnchoGF],$Pedido[AltoGF],'$Pedido[NombreImagen]',
											$Pedido[TiempoProceso]);";
				$Insersion=$BD->Seleccionar($query);
				echo json_encode(array('Registros'=>$Insersion));
			break;
			case 'MostrarReg':
				$query="SELECT servicios.idServicios, pedidos.TiempoProcesosPedido, pedidos.id, concat(servicios.Nombre,' ',materiales.Nombre ,' ', pedidos.AltoGF, 'x', pedidos.AnchoGF) as 
					'Servicio', SUM(pedidos.Cantidad) AS 'Cantidad', 
					SUM(pedidos.TotalPagarServicio) as 'Total' 
					FROM encabezadopedidos 
					INNER JOIN pedidos 
					INNER JOIN servicios 
					INNER JOIN materiales 
					ON encabezadopedidos.id = pedidos.idEncabezado 
					AND pedidos.idServicio = servicios.idServicios 
					AND pedidos.idMateriales = materiales.idMateriales 
					WHERE encabezadopedidos.id = '$Pedido[idEncabezado]' 
					group by servicios.Nombre, materiales.Nombre, pedidos.id";
					$Registro=$BD->Seleccionar($query);
					echo $JSON->getJson($Registro);
			break;
			case 'Precio':
				$query="SELECT precios.Precio, precios.PrecioMaximo, precios.CantidadDeProducto from precios 
						inner join serviciosprecios on precios.id= serviciosprecios.idPrecio
						inner join servicios ON servicios.idServicios = serviciosprecios.idServicio
						inner join materiales on materiales.idMateriales = serviciosprecios.idMateriales
						where servicios.idServicios='$_POST[idServicio]' and materiales.idMateriales='$_POST[idMaterial]';";
				$Precio=$BD->Seleccionar($query);
				if($Precio!=null){
					echo  $JSON->getJson($Precio);
				}
				else{
					echo  $JSON->getJson(array('Precio'=>0));
				}
			break;
			case 'GuardarProcesos':
				extract($ArrayValores);
				extract($ArrayNombres);
				extract($ArrayPP);
					for ($i=0; $i < count($ArrayValores); $i++) { 
						$query="INSERT INTO prioridadprocesos VALUES ('','$ArrayPP[Observaciones]', '$ArrayPP[estatus]', '$ArrayPP[Pedidos_id]', '$ArrayNombres[$i]', '$ArrayValores[$i]');";
						$Insersion=$BD->Insertar($query);
					}
				if($Insersion) {
					echo json_encode(array('Mensaje'=>'Se inserto correctamene la información'));
				}
				else {
					echo json_encode(array('Mensaje'=>'NO INSERTO PROCESOS, GRITAAAAA!!'));
				}
			break;
			case 'EliminarPedido':
			$query="DELETE FROM pedidos WHERE `id`='$idpedidoEliminar';";
				$Eliminarp=$BD->Insertar($query);
				if($Eliminarp)  {
					echo json_encode(array('Mensaje'=>'Se eliminó la información correctamente','Eliminado'=>true));
				}
				else {
					echo json_encode(array('Mensaje'=>'Hubo un problema al eliminar el registro!','Eliminado'=>false));
				}
			break;
			case 'Actualizados':
					$query="SELECT concat(servicios.Nombre,' ',materiales.Nombre) as 'Servicio', 
							SUM(pedidos.Cantidad) AS 'Cantidad', 
							SUM(pedidos.TotalPagarServicio) as 'Total' 
							FROM encabezadopedidos 
							INNER JOIN pedidos 
							INNER JOIN servicios 
							INNER JOIN materiales 
							ON encabezadopedidos.id = pedidos.idEncabezado 
							AND pedidos.idServicio = servicios.idServicios 
							AND pedidos.idMateriales = materiales.idMateriales 
							WHERE encabezadopedidos.id = '$idEncabezado' 
							group by servicios.Nombre, materiales.Nombre";
					$Registro=$BD->Seleccionar($query);
					echo $JSON->getJson($Registro);
			break;
			case 'UsuarioLogueado':
				$query="SELECT FolioPedido FROM encabezadopedidos order by FolioPedido desc limit 1";
				$Folios=$BD->Seleccionar($query);
				if($Folios!=null){
					echo  $JSON->getJson($Folios);
				}
				else
				{
					echo  $JSON->getJson(array('FolioPedido'=>1));
				}
				$BD->Desconectar();
			break;
			case 'EliminarPedidoCompleto':
				$Query="call EliminarElPedidoCompleto($idEncabezadoAEliminar)";
				$Eliminar=$BD->Seleccionar($Query);
				echo  $JSON->getJson(array('Mensaje'=>'Se eliminó correctamente todo el pedido.','Insercion'=>true));
				$BD->Desconectar();
			break;
			case 'TiempoFinalPedido':
				$query="select HorasDias($TiempoMin) as TiempoTotalasd";
				$Time=$BD->Seleccionar($query);
				$querySoloHoras="select HorasMinutos($TiempoMin) as HorasCompletas;";
				$SoloHoras=$BD->Seleccionar($querySoloHoras);
				echo $JSON->getJson(array('Fecha'=>$Time,'HorasCompletas'=>$SoloHoras));
				$BD->Desconectar();
			break;
			case 'FechaPromesa':
				// print_r($CadenaFecha);
				// print_r($horasC);
				$query="select LaFecha('$CadenaFecha',$horasC) as FechaPrometida";
				// print_r($query);
				$FechaPrometida=$BD->Seleccionar($query);
				echo $JSON->getJson(array('Fecha' => $FechaPrometida ));
			break;
			case 'RegistrarFecha':
				extract($Fechas);
				// print_r($Fechas['FechaPromesa']);
				$query="insert into FechaEntregaPedido(FechaPromesa,FechaReal,idEncabezadoPedido) values('$Fechas[FechaPromesa]','$Fechas[FechaReal]',$Fechas[idEncabezadoPedido]);";
				$InsertarFechas=$BD->Insertar($query);
				if($InsertarFechas){
					echo json_encode(array('Mensaje'=>'Siiiiiii','Insertado'=>true));
				}
				else{
					echo json_encode(array('Mensaje'=>'neeeeeeh','Insertado'=>false));
				}
			break;
		}	
	} catch (Exception $e) {
		echo $JSON->getJson($e->getMessage());
	}
?>