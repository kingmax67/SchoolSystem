<?php

    $serv = "mysql:host=localhost;dbname=caleb";
	$user = "root";
	$pass = "";
	
	try
	{
		$con = new PDO($serv, $user, $pass);
	}
	catch (PDOException $err)
	{
		$error_message = $err->getMessage();
		echo $error_message();
		exit();
	}
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>