<?php

function token_generator($length)
{
	$keychars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$randkey = "";
	$max=strlen($keychars)-1;
	for ($i=0;$i<$length;$i++) 
	{
		$randkey .= substr($keychars, rand(0, $max), 1);
	}
	return $randkey;
}
if(isset($_FILES["Imagen"])) {
	$file= $_FILES["Imagen"];
	$nombre=$file['name'];
	$variable=token_generator(200);
	$tipo =$file['type'];
	// print $tipo;
	$tamano= $file['size'];
	$ruta_provicional= $file["tmp_name"];
	$carpeta= "../Imagenes/imgUploads/"; 
	$files_ok = array("image/jpeg",	//JPEG
					"image/jpg",	//JPG
					"image/gif",	//GIF
					"image/png",	//PNG
					"image/bmp",	//BMP
					"image/tiff",	//Tiff
					"image/vnd.adobe.photoshop",	//Potoshop
					"application/crd",	//CorelDraw
					"application/dwg",	//AutoCad
					"image/svg+xml",	//SVG
					"application/postscript",	//AI
					"application/x-rar-compressed",	//RAR
					"application/octet-stream",//"application/zip",	//ZIP
					"image/x-icon",	//ICO
					"application/pdf",	//PDF
					"application/msword",	//WORD
					"application/vnd.ms-powerpoint",	//PowerPoint
					"image/NEF");	//RAW
	$max_size="524288000";
	//$max_size="500M";
	// No utilizado aun
	// $name_image	= md5(microtime().$variable).'.'.strtolower($tipo);	
	$src =$carpeta.$nombre;
	if(in_array($tipo, $files_ok)){
		if($tamano>$max_size){
			echo json_encode(array('Mensaje'=>'El archivo es muy grande', 'Insertar'=>false));
		}
		else{
			move_uploaded_file($ruta_provicional, $src);
			echo "Se subio";
		}
	}
	else{
		echo json_encode(array('Mensaje'=>'Formato del archivo no compatible', 'Insertar'=>false));
	}
}



// session_start();
// error_reporting(0);

// function token_generator($length)
// {
// 	$keychars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
// 	$randkey = "";
// 	$max=strlen($keychars)-1;
// 	for ($i=0;$i<$length;$i++) 
// 	{
// 		$randkey .= substr($keychars, rand(0, $max), 1);
// 	}
// 	return $randkey;
// }

// $directorio	= "uploads/";								
// $max_size	= "524288000"; 			
								// NO LO OLVIDES
// $files_ok	= array("jpeg","jpg","gif","png","psd","bmp","tiff","psb","raw","crd","dwg","svg","ai");						
// $variable	= token(20);												
// $size		= $_FILES['userImage']['size'];							
// $type		= strtolower(str_replace("image/","",$_FILES['userImage']['type']));
// $name_image	= md5(microtime().$variable).'.'.strtolower($type);	
// if(!file_exists($directorio))
// {
// 	mkdir($directorio);
// 	chmod($directorio,0777);
// }
// if(in_array($type,$files_ok))
// {
// 	if($size>$max_size)
// 	{
// 		echo "El tamaño del archivo es muy grande";			
// 	}
// 	else
// 	{
// 		if(move_uploaded_file($_FILES['userImage']['tmp_name'],$directorio.$name_image))
// 		{
// 			echo "Se logro guardar el archivo de imagen";				
// 		}
// 		else
// 		{
// 			echo "Hubo algun error al subir el archivo al servidor";		
// 		}
// 	}
// }
// else
// {
// 	echo "El tipo de archivo es invalido";			
// }
// ?>