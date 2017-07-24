<?php
	include ('../includes/sql.php');
	extract($_POST);
	$BD = new SQL();
	try {
		$query = "UPDATE Precios SET Precio = '$_POST[Precio]', Descripcion = '$_POST[Descripcion]',PrecioMaximo='$_POST[PrecioM]' WHERE Precios.id = '$_POST[Id]'";
		$ws = $BD->Insertar($query);
		if ($ws) {
			echo json_encode(array('Mensaje' => 'Se modificó la información correctamente', 'insersion' => true));
		}
		else
		{
			echo json_encode(array('Mensaje' => 'Ups! Ocurrio un problema, contacte a su administrador de sistemas por favor', 'insersion' => false));
		}
		$BD->Desconectar();
	}
	catch (Exception $e) {
		echo json_encode($e->getMessage());
	}
?>
