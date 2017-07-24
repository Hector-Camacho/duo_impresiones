<?php
include ("../includes/sql.php");
	$BD = new SQL();
	
	function Fecha()
	{
		date_default_timezone_set("America/Chihuahua");
		$hoy = date("Y-m-d ");
		return $hoy;
	}
	try{	
		$Fecha= Fecha();
		
		$query="INSERT INTO UsuariosPedidos VALUES ('','$_POST[idUsuario]','$_POST[StatusPedido]','$Fecha','$_POST[idPedido]')";
		$insercion=$BD->Insertar($query);
		if ($insercion) {
			$ConsultaModi="UPDATE Pedidos SET StatusPedido='$_POST[StatusPedido]' WHERE id='$_POST[idPedido]'";
			$Modifico=$BD->Insertar($ConsultaModi);
			if($Modifico){
				echo json_encode(array("Mensaje"=>"El pedido a entrado correctamente al flujo de trabajo","Insercion"=>true));
			}	
			else{
				echo json_encode(array("Mensaje"=>"Inconsistencia de datos, favor de llamar a su administrador del sistema"));
			}
		}
		else{
			echo json_encode(array("Mensaje"=>"Ocurrio un imprevisto al ingresar el pedido al flujo del trabajo","Insercion"=>false));
		}
	}
	catch(Exeption $e){
			echo "Valio tortoise este desmadre";
	}
?>