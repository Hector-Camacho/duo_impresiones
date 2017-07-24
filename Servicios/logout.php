<?php
	session_start();//este codigo es para 
	session_destroy();// cerrar session 
	header('Location:../index.php'); // y despues enviarlo a una pag como la de inicio
?>