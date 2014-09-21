<?php
session_start();

	unset($_SESSION['userid']);
	unset($_SESSION['cemail']);
	unset($_SESSION['username']);
	header("location: ../index.php");

?>