<?php 
	include ("../includes/sql.php");
	include ("../includes/json.php");
	$SQLConexion= new SQL();
	$JSON = new Json();
	extract ($_POST);
	$Disponible= true;
	$query="SELECT count(NombreUsuario) from Usuarios where NombreUsuario='$_POST[nombreusuario]'";
		$Datos=$SQLConexion->Existe($query);
		if($Datos>0){
			$Disponible=false;
		}
	echo $JSON->getJson(array('valid' => $Disponible,));
 ?>