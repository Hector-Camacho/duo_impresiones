<?php
	include ('../includes/sql.php');
	extract($_POST);
	$BD = new SQL();
	try {
		$query = "DELETE FROM Precios WHERE id = '$_POST[Id]'";
		$Eliminar = $BD->Insertar($query);
		if ($Eliminar) {
			echo json_encode(array('Mensaje' => 'Se eliminó la información correctamente', 'insersion' => true));
		}
		else {
			echo json_encode(array('Mensaje' => 'Ups! Ocurrio un problema, contacte a su administrador de sistemas por favor', 'insersion' => false));
		}
	}
	catch (Exception $e) {
		echo $e->getMessage();
	}
?>
