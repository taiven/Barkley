<?php

class DataConnect {

    public function Connect(){
	
		return new PDO("mysql:host=localhost; dbname:barkley","barkley","barkley");

        }
}
?>
