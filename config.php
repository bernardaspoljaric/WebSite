<?php 
	session_start();

	$servar = "localhost";
	$user = "root";
	$password = "";
	$db_name = "WP_database";

	$conn = mysqli_connect($servar, $user, $password, $db_name);

	if(!$conn){
	die("Neuspješno povezivanje: " .mysqli_connect_error());
	}

	define ('ROOT_PATH', realpath(dirname(__FILE__)));
	define('BASE_URL', 'http://localhost/webProgramiranje-Projekt/');
?>