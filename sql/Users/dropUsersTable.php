<?php
	/*
		Kyle Demers
		Web Dev 2
		drawThis - drop users table
	*/	
	
	 $servername = "localhost";
	 $username = "t0tallyk_kdemers";
	 $password = "CIS2304572";
	 $dbname = "t0tallyk_dbkdemers7360";

	 // Create connection
	 $conn = new mysqli($servername, $username, $password, $dbname);
	 // Check connection
	 if ($conn->connect_error) 
	 {
	 	die("Connection failed: " . $conn->connect_error);
	 } 

	
	 $sql = "DROP TABLE Users";
				

	if ($conn->query($sql) === TRUE) {
   		 echo "Table removed.";
	} else {
  	  echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();


?>