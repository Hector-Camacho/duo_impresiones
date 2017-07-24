<?php 
	include ("../includes/sql.php");
	extract($_POST);
	/*DELETE FROM `duoimpresiones`.`clientes` WHERE `idClientes`='1';*/
	$ConexionSQL= new SQL();
	try {
			$query="DELETE from Empleados where Empleados.id='$_POST[idEmpleados]'";
			$Eliminar= $ConexionSQL->Insertar($query);
			if($Eliminar){
				// echo "se boroo";
				$query="DELETE from Direccion where Direccion.id='$_POST[idDireccion]' ";
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
				$Error="La informacion de este empleado no es posible eliminarla, ya que sus datos son utilizados por otro complemento del sistema.";
				// throw new Exception($Error);
				echo json_encode(array('mensaje'=>$Error,'Eliminado'=>false));
			}
		
	} catch (Exception $e) {
		echo  json_encode(array('Mensaje'=>$e->getMessage()));
	}

?>