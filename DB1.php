<?php

	$dsn = 'mysql:host=localhost;dbname=project';
	$username = 'asg01';
	$password = 'hello';
	
	try
	{
		$db = new PDO($dsn,$username,$password);
	}
	catch(PDOException $e)
	{
		print("database conn was successful");
		$error_message = $e->getmessage();
		print("$error_message");
	}

?>