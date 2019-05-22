<?php
	/*
		Kyle Demers
		Web Dev 2
		drawThis - create users table
	*/
	
	$servername = "localhost";
	$username = "t0tallyk_kdemers";
	$password = "CIS2304572";
	$dbname = "t0tallyk_dbkdemers7360";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	 
	// Check connection
	if($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}//close if

	// sql to create table
	$sql = "CREATE TABLE Users(
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				status VARCHAR(8) NOT NULL
			)";

	if($conn->query($sql) === TRUE) {
		echo "Table created successfully";
	}//close if
	else{
		echo "Error creating table: " . $conn->error;
	}//close else

	$conn->close();
?>