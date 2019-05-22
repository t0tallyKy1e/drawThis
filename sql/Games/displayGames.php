<?php
	/*
		Kyle Demers
		Web Dev 2
		drawThis - display games table
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
	$sql = "SELECT * FROM Games ORDER BY game ASC";
	 
	$result = $conn->query($sql);

	if ($result->num_rows > 0){
		//output data of each row
		while($row = $result->fetch_assoc()){
			echo $row["game"]. " - " . $row["id"] . " - " . $row["status"] . " - " . $row["image"] . " - " . $row["word"] . " - " . $row["category"] . " - " . $row["guess"] . "<br>";
		}//close while
	} //close if
	else{
		echo "0 results";
	}//close else

	$conn->close();
?>
