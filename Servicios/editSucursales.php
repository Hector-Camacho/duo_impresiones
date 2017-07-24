<?php 
	include ("../includes/sql.php");
	extract($_POST);
	try {
		$SQL= new SQL();
		$query= "UPDATE SucursalesDuo set NombreSucursal='$NombreSucursal',
				CalleSucursal='$CalleSucursal',
				NumeroSucursal='$NumeroSucursal',
				ColoniaSucursal='$ColoniaSucursal',
				TelefonoSucursal='$TelefonoSucursal'
				where idSucursalesDuo='$idSucursalesDuo'
				";
		
		$Modificar= $SQL->Insertar($query);
		if($Modificar){
			echo json_encode(array('Mensaje'=>'Se modificó la información correctamente','Insercion'=>true));
			
		}
		else{
			echo json_encode(array('Mensaje'=>'Ups! Ocurrio un problema, contacte a su administrador de sistemas por favor','Insercion'=>false));
			
		}
	} catch (Exception $e) {
		
	}




?>