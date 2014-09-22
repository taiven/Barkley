<?php
	include("../../bk-config.php");
	class DataConnect{
		public function __construct(){
			return new mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
		}
	}
?>
