<?php
	include ("../includes/sql.php");
	extract($_POST);
	$BD = new SQL();
	try{
		$query="UPDATE Bancos SET NombreBanco = '$_POST[Nombre]' WHERE idBancos='$_POST[Id]'";
		$insersion=$BD->Insertar($query);
		if($insersion){
			echo json_encode(array("Mensaje"=>"La informacion ha sido modificada exitosamente!", "Insersion"=>true));
		}
		else{
			echo json_encode(array("Mensaje"=>"La informacion no ha sido modificada", "Insersion"=>false));
		}
	}catch(Exeption $e){
		$e->getMessage();
	}
?>