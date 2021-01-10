<?php
	//attempts to connect to db
	try {
  	$dsn = 'mysql:host=localhost; dbname=nachipatildatabase';
  	$db = new PDO ($dsn, "nachipatil", "nachipatilpass");

  	// set the PDO error mode to exception
  	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} 	

	//outputs error if db connection fails
	catch(PDOException $e) {
  		echo "Connection failed: ".$e->getMessage();
	}
?>