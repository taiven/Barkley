<?php

	spl_autoload_register(function ($class) {
    include 'bk-admin/includes/' . $class . '.php';
	});

?>