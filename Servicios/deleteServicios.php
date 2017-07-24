<?php
include ("../includes/sql.php");
extract($_POST);
$BD = new SQL();
if ($NombreFuncion=="EliminarPrecio") {
	try
	{
		$query="DELETE FROM Precios WHERE `id`='$Precio[Id]'";
		$Elimino=$BD->Insertar($query);
		if($Elimino){
			echo json_encode(array('Mensaje'=>'Se eliminó la información correctamente','Insersion'=>true));
		}else{
			echo json_encode(array('Mensaje'=>'El precio no ha sido eliminado','Insersion'=>false));
		}	
	}catch(Exeption $e){
		echo $e->getMessage();
	}
	
 }
 else{
	try
	{
		$query="DELETE FROM Servicios WHERE `idServicios`='$_POST[Id]'";
		$Eliminar=$BD->Insertar($query);
		if($Eliminar){
			echo json_encode(array('Mensaje'=>'Se eliminó la información correctamente','Insersion'=>true));
		}
		else
		{
			echo json_encode(array('Mensaje'=>'Ups! Ocurrio un problema, contacte a su administrador de sistemas por favor','Insersion'=>false));
		}
	}
	catch(Exeption $e)
	{
		echo $e->getMessage();
	}	
}

?>	