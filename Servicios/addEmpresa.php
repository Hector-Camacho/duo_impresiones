<?php 
	include ("../includes/sql.php");
	$SQLConexion= new SQL();
	extract($_POST);
	try 
	{
		
		$query="INSERT INTO empresas values('','$_POST[nombreempresa]','$_POST[rfcempresa]','$_POST[idclienterepresentante]')";
		$registro=$SQLConexion->Insertar($query);
		
		if($registro)
		{
			echo "Empresa registrada con exito";
		}
		else
		{
			echo "No se guardo el registro...";
		}
	} 
	catch (Exception $e) 
	{
		echo "Ha ocurrido un error, comunicate con el admin, del sistema para notificarlo...";
	}
 ?>