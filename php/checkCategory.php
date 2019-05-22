<?php
	/*
		Kyle Demers
		04/19/2016
		Final Project - Checks what the category is for the contestant
	*/
	$data = $_POST;
	$user = $data[id];
	$opp = $data[oppid];
	
	if($opp > $user){
		$larger = $opp;
		$smaller = $user;
	}//close if
	else{
		$larger = $user;
		$smaller = $opp;
	}//close else
	
	$gameID = $smaller . $larger;
	
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
	
	$sql = "SELECT * FROM Games WHERE game = '$gameID'";
	 
	$result = $conn->query($sql);

	if ($result->num_rows > 0){
		if($row = $result->fetch_assoc()){
			$object = array('word'=> $row["word"], 'category' => $row["category"], 'id'=> $row['id']);
			
			echo $object[category];
		}//close while
	}//close if
	else{
		echo "0 results";
	}//close else

	$conn->close();
?>