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