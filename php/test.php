<?php
	$config = parse_ini_file("../../../../db_admin.ini");

	$servername = $config['server_name'];
	$dbname = $config['db_name'];
	$username = $config['db_username'];
	$password = $config['password'];
	
	//Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	 
	//Check connection
	if ($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}//close if

    echo "This is working";
?>