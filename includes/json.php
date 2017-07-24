<?php

	Class Json 
	{
		public function __construct(){}
		
		public function __destruct(){}
		
		public function getJson($arrayAssoc)
		{
			return json_encode($arrayAssoc);
		}
		
		public function jsonDecode($array)
		{
			return json_decode($array);
		}
	}

?>