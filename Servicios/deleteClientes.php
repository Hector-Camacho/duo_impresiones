<?php 
	include ("../includes/sql.php");
	extract($_POST);
	// print_r($_POST);
	/*DELETE FROM `duoimpresiones`.`clientes` WHERE `idClientes`='1';*/
	$ConexionSQL= new SQL();
	try {
			$query="DELETE from Clientes where idClientes='$_POST[idC]'";
			$Eliminar= $ConexionSQL->Insertar($query);
			if($Eliminar){
				// echo "se boroo";
				$query="DELETE from Direccion where id='$_POST[idD]' ";
				$EliminarDireccion=$ConexionSQL->Insertar($query);
		
				if($EliminarDireccion){
				// echo "Se elimino la direccion";
					echo json_encode(array('mensaje'=>'Se eliminó la información correctamente','Eliminado'=>true));
				}
				else{
					echo json_encode(array('mensaje'=>'Ocurrio un problema al eliminar el registro','Eliminado'=>false));
				}
			}
			else{
				echo "noooo";
			}
		
	} catch (Exception $e) {
		
	}

?>