<?php
	
	$dsn = 'mysql:host=localhost; dbname=dpt_db';
	$username = 'root';
	$password = '';

	try{
		$pdo = new PDO($dsn, $username, $password);
	}catch(PDOException $ex){
		echo 'Connection Failed'.$ex->getMessage();
	}


?>