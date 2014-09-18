<?php
	class DataConnect{
		public function __construct(){
			return new PDO("mysql:host=localhost; dbname:barkley","barkley","barkley");
		}
	}
?>
