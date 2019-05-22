<?php
	/*
		Kyle Demers
		Web Dev 2
		drawThis - create games table
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
	$sql = "CREATE TABLE Games(
				game VARCHAR(10),
				id INT(6) UNSIGNED,
				status VARCHAR(10),
				image blob,
				word VARCHAR(30),
				category VARCHAR(30),
				guess VARCHAR(30)
			)";

	if($conn->query($sql) === TRUE) {
		echo "Table created successfully";
	}//close if
	else{
		echo "Error creating table: " . $conn->error;
	}//close else
	
	//insert data
	$sql = "REPLACE INTO Games (game, id, status, word, category, guess) 
			VALUES ('12', '1', 'artist', 'dog', 'animal', 'cat')";
			
	if($conn->query($sql) === TRUE){
		echo "New record created successfully";
	}//close if
	else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}//close else	

	$conn->close();
?>