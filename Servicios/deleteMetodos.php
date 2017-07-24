<?php
	include ("../includes/sql.php");
	extract($_POST);
	$BD = new SQL();
	try{
		$query="DELETE FROM FormasDePago WHERE idFormasDePago='$_POST[Id]'";
		$insersion=$BD->Insertar($query);
		if($insersion){
			echo json_encode(array("Mensaje"=>"La informacion ha sido eliminada exitosamente!", "Insersion"=>true));
		}
		else{
			echo json_encode(array("Mensaje"=>"La informacion no ha sido eliminada", "Insersion"=>false));
		}
	}catch(Exeption $e){
		$e->getMessage();
	}
?>