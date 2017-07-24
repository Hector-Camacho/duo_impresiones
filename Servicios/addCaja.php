<?php
	include ("../includes/sql.php");
	include ("../includes/json.php");
	
	$JSON = new Json();
	$SQLConexion= new SQL();
	extract($_POST);
	function Fecha()
	{
		date_default_timezone_set("America/Chihuahua");
		$hoy = date("Y-m-d ");
		return $hoy;
	}
	
	switch ($_POST['TipoAccion']) {
		case 'ConsultaPedido':
			$query="SELECT concat(servicios.Nombre , ' ',materiales.Nombre) as 'nombre',pedidos.idEncabezado, pedidos.Cantidad AS 'cantidad', encabezadopedidos.id, Pedidos.idServicio
				from Pedidos inner join Servicios
				on servicios.idServicios=pedidos.idServicio
				inner join encabezadopedidos on encabezadopedidos.id = pedidos.idEncabezado
				inner join materiales on materiales.idMateriales= pedidos.idMateriales
				group by servicios.Nombre, materiales.Nombre, encabezadopedidos.FolioPedido;";
			echo $JSON->getJson($SQLConexion->Seleccionar($query));
			$SQLConexion->Desconectar();
			break;
		case 'Anticipo':
			if($CantidadDePago<$Saldo){
				echo json_encode(array("Mensaje"=>" Cantidad de pago insuficiente","SaldoInsuficiente"=>true));
			}
			else {
				$Residuo=$CantidadDePago-$Saldo;
				if($Residuo>0){ $Cambio ="Su cambio: $ ".$Residuo; }
				else{ $Cambio ="Su cambio: $ 0"; }
				
				$Fecha=Fecha();
				$query="INSERT INTO pagospedidos VALUES ('','$Fecha','$idEncabezadoCargado','0','$Saldo','$ObservacionesDelPago')";
				$InsertarPago=$SQLConexion->Insertar($query);
				if($InsertarPago){
					$queryFP="INSERT INTO formasdepago_has_encabezadopedidos VALUES ('','$FormaPago','$idEncabezadoCargado')";
					$InsertarFormaPago=$SQLConexion->Insertar($queryFP);
					if($InsertarFormaPago){
						echo json_encode(array('Mensaje'=>'Se guardo correctamente la informacion del pago', 'Insertar'=>true, "Cambio"=>$Cambio,"SaldoInsuficiente"=>false));
					}
					else{
						echo json_encode(array('Mensaje'=>'No se pudo completar la acción', 'Insertar'=>false));
					}
				}
				else{
					echo json_encode(array('Mensaje'=>'No se pudo completar la acción', 'Insertar'=>false,"SaldoInsuficiente"=>false));			
				}
			}
			$SQLConexion->Desconectar();
			break;
		case 'SumaTotalPedido':
			$query="select encabezadopedidos.id as 'Identificador',
					TotalComprado('$_POST[idEncabezadoP]') as 'TotalComprado',
					encabezadopedidos.FolioPedido as Folio, 
					VerificarSaldoPedido($_POST[idEncabezadoP]) as 'CantidadDebe' 
					from encabezadopedidos 
					where encabezadopedidos.FolioPedido='$_POST[Folio]'";
			$Suma=$SQLConexion->Seleccionar($query);
			echo $JSON->getJson(array($Suma));
			$SQLConexion->Desconectar();
			break;

		case 'Status';
		$query="SELECT 
			    encabezadopedidos.FolioPedido AS 'Folio',
			    encabezadopedidos.id AS 'Encabezado',
			    servicios.idservicios AS 'Servicio'
			FROM
			    encabezadopedidos
			        INNER JOIN
			    pedidos
			        INNER JOIN
			    servicios ON encabezadopedidos.id = pedidos.idEncabezado
			        AND pedidos.idServicio = servicios.idServicios
			WHERE
			    EncabezadoPedidos.FolioPedido = '$_POST[Folio]'";
			//-------------------Falta validacion aqui---------------
			$arreglo=$SQLConexion->Seleccionar($query);
			if(count($arreglo)>0)
			{
				for ($i=1; $i <count($arreglo); $i++) {
					$Folio=$arreglo[$i]['Folio'];
					$Encabezado=$arreglo[$i]['Encabezado'];
					$Servicio=$arreglo[$i]['Servicio'];
					$query="call ConsultaPedidoFolio($Folio,$Encabezado,$Servicio)";
                    echo $JSON->getJson($SQLConexion->Seleccionar($query), array("Mensaje"=>"Trae datos"));
					$SQLConexion->Desconectar();
				}
			}
			else{
				echo $JSON->getJson(array("Mensaje"=>"No trae nada", 'Datos'=>0));
			}
			
			    
			break;
		default:
			# code...
			break;
	}
	
 ?>