<?php 
	include ("../includes/sql.php");
	
	extract($_POST);
	try {
		$SQLConexion= new SQL();
		$query="UPDATE Materiales set Nombre='$_POST[NombreMaterial]' where idMateriales='$_POST[IdentificadorMaterial]'";
		$Modificar=$SQLConexion->Insertar($query);
		if($Modificar){
			echo json_encode(array('msg'=>'Se modificó la información correctamente','insercion'=>true));
		}
		else{
			// echo json_encode(array('Mensaje'=>'No se modifico el registro ','insercion'=>false));
			echo json_encode(array(mysql_error()));
			
		}
	} catch (Exception $e) {
			echo json_encode(array('Mensaje'=>$e->getMessage()));
		
	}
	

 ?>