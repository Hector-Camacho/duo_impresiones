<?php 
	include ("../includes/sql.php");
	extract($_POST);
	
	try {
		$SQL=new SQL();
		$query="DELETE from SucursalesDuo where idSucursalesDuo='$idSucursalesDuo'";
		$Eliminar=$SQL->Insertar($query);
		if($Eliminar){
			echo json_encode(array('Mensaje'=>'Se eliminó la información correctamente','Insercion'=>true));
		}
		else{
			echo json_encode(array('Mensaje'=>'Ups! Ocurrio un problema, contacte a su administrador de sistemas por favor','Insercion'=>false));
			
		}
		
	} catch (Exception $e) {
		
	}


?>