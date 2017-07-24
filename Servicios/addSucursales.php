<?php 
	include ("../includes/sql.php");
	extract($_POST);
	try {
		$SQL= new SQL();
		$query="insert into SucursalesDuo values('','$ClaveSucursal','$NombreSucursal','$CalleSucursal','$NumeroSucursal','$ColoniaSucursal','$TelefonoSucursal')";
		$NuevaSucursal= $SQL->Insertar($query);
		if($NuevaSucursal){
			// echo "Se registro";
			echo json_encode(array('Mensaje'=>'Se registró la información correctamente','Insercion'=>true));
			
		}
		else{
			echo json_encode(array('Mensaje'=>'Ups! Ocurrio un problema, contacte a su administrador de sistemas por favor','Insercion'=>false));
			
		}
		
		
	} catch (Exception $e) {
		
	}



 ?>