<?php

	spl_autoload_register(function ($class) {
    include 'bk-admin/includes/' . $class . '.php';
	});

	define('DB_HOST', 'localhost');
	define('DB_USER', 'barkley');
	define('DB_PASS', 'barkley');
	define('DB_NAME', 'barkley');

?>