<?php
	/*
		Kyle Demers
		04/19/2016
		Final Project - PHP display subjects table
	*/
	
	$servername = "localhost";
	$username = "t0tallyk_kdemers";
	$password = "CIS2304572";
	$dbname = "t0tallyk_dbkdemers7360";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	 
	// Check connection
	if ($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}//close if
	
	//select all
	$sql = "SELECT * FROM Subjects ORDER BY id ASC";
	 
	$result = $conn->query($sql);

	if ($result->num_rows > 0){
		//output data of each row
		while($row = $result->fetch_assoc()){
			//we have an array of results - we could convert to JSON and send to JS 
			echo "id: " . $row["id"]. " - " . $row["word"]. " - " . $row["category"]."<br>";
		}//close while
	} //close if
	else{
		echo "0 results";
	}//close else

	$conn->close();
?>
