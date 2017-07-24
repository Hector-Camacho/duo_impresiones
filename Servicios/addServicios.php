<?php
	include ("../includes/sql.php");
	extract($_POST);
	// print_r($_POST);
	try {
	$BD = new SQL();
	$query="INSERT INTO Servicios (`Nombre`, `Categoria`, `UnidadVenta`,`estatusHab`) VALUES ('$Nombre', '$Categoria', '$UnidadVenta','$Estatus')";		
		// $query="INSERT INTO `Servicios` (`Nombre`, `Categoria`,`UnidadVenta`) VALUES ('$_POST[Nombre]', '$_POST[Categoria],'$_POST[UnidadVenta]')";
		$ws= $BD->Insertar($query);	
		if($ws){
			echo json_encode(array('Mensaje'=>'Se registró la información correctamente','insersion'=>true));
		}
		else{
			echo json_encode(array('Mensaje'=>'Ups! Ocurrio un problema, contacte a su administrador de sistemas por favor','insersion'=>false));
		}
		$BD->Desconectar();
	} catch (Exception $e) {
	// 	echo json_encode($e->getMessage());
	}
?>


