<?php
	include ("../includes/sql.php");
	extract($_POST);
	$BD = new SQL();
	try{
		$query="DELETE FROM Empresas WHERE `idEmpresas`=$_POST[Id];";
		$registro=$BD->Insertar($query);
		if($registro)
		{
			echo json_encode(array('Mensaje'=>'Se eliminó la información correctamente','Insercion'=>true));
		}
		else
		{
			echo json_encode(array('Mensaje'=>'Hubo un problema al eliminar el registro!','Insercion'=>false));
		}
	}
	catch(Exeption$e)
	{
		echo $e->getMessage();
	}
?>