<?php
	include ("../includes/sql.php");
	$BD = new SQL();
	try{
		$query="INSERT INTO bancos VALUES ('','$_POST[Nombre]')";
		$insersion=$BD->Insertar($query);
		if($insersion){
			echo json_encode(array("Mensaje"=>"La informacion fue guardada exitosamente!", "Insersion"=>true));
		}
		else{
			echo json_encode(array("Mensaje"=>"La informacion no pudo ser guardada", "Insersion"=>false));
		}
	}
	catch(Exeption $e){

	}

?>