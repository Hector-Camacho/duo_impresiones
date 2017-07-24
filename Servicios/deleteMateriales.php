<?php 

	include ("../includes/sql.php");
	extract($_POST);
	$SQLConexion= new SQL();
	try {
		/*DELETE FROM `duoimpresiones`.`materiales` WHERE `idMateriales`='3';*/
		$query="DELETE from Materiales where idMateriales='$_POST[IdentificadorMaterial]'";
		$Eliminar=$SQLConexion->Insertar($query);
		if($Eliminar){
			echo json_encode(array('Mensaje'=>'Se eliminó la información correctamente','insercion'=>true));
		}
		else{
			echo json_encode(array('Mensaje'=>'No Se eliminó el registro','insercion'=>false));	
		}
	} catch (Exception $e) {
		
	}

 ?>