<?php
	/*
		Kyle Demers
		Web Dev 2
		drawThis - create subjects table
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
	$sql = "CREATE TABLE Subjects(
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,  
				word VARCHAR(30) NOT NULL,
				category VARCHAR(30) NOT NULL
			)";

	if($conn->query($sql) === TRUE) {
		echo "Table created successfully";
	}//close if
	else{
		echo "Error creating table: " . $conn->error;
	}//close else
	
	//insert data
	$sql = "INSERT INTO Subjects (word, category) 
			VALUES ('hamburger', 'food'),
			('dog', 'animal'),
			('lamp','household item'),
			('laptop','technology'),
			('shirt','clothing')";			

	if($conn->query($sql) === TRUE){
		echo "New record created successfully";
	}//close if
	else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}//close else

	$conn->close();

	/*
	other queries

	INSERT INTO Table (col1, col2) 
	VALUES ('val1', val2')

	DELETE FROM table_name
	WHERE some_column=some_value

	DROP TABLE table_name


	*/
?>