<?php
	include ('../includes/sql.php');
	include ('../includes/json.php');
	$BD= new SQL();
	$JSON=new Json();
	try{	
		$query="SELECT * FROM FormasDePago";
		echo $JSON->getJson($BD->Seleccionar($query));
		$BD->Desconectar(); 
	}
	catch(Exeption$e){
		echo $e->getMessage();
	}
?>