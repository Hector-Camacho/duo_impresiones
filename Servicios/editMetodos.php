<?php
	include ("../includes/sql.php");
	extract($_POST);
	$BD = new SQL();
	try{
		$query="UPDATE FormasDePago SET FormaPago = '$_POST[Nombre]' WHERE idFormasDePago='$_POST[Id]'";
		$insersion=$BD->Insertar($query);
		if($insersion){
			echo json_encode(array("Mensaje"=>"La informacion ha sido modificada exitosamente!", "Insersion"=>true));
		}
		else{
			echo json_encode(array("Mensaje"=>"La informacion no ha sido modificada", "Insersion"=>false));
		}
		$BD->Desconectar();
	}catch(Exeption $e){
		$e->getMessage();
	}
?>