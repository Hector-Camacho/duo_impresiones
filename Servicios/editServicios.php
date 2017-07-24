<?php
	include ("../includes/sql.php");
	extract($_POST);
	$BD = new SQL();
	try {
		$query="UPDATE Servicios SET Nombre='$_POST[Nombre]', Categoria='$_POST[Categoria]', UnidadVenta='$_POST[UnidadVenta]', estatusHab='$_POST[estatusHab]' WHERE idServicios='$_POST[Id]'";
		$ws= $BD->Insertar($query);
		if($ws) {
			echo json_encode(array('Mensaje'=>'Se modificó la información correctamente','insersion'=>true));
		}
		else {
			echo json_encode(array('Mensaje'=>'Ups! Ocurrio un problema, contacte a su administrador de sistemas por favor','insersion'=>false));
		}
		$BD->Desconectar();
	} catch (Exception $e) {
		
	}
	
?>