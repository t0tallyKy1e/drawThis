<?php
	/*
		Kyle Demers
		04/19/2016
		Final Project - PHP change user status to 'occupied'
	*/

	$user = $_POST;
	$userID = $user[id];
	
	
	$servername = "localhost";
	$username = "t0tallyk_kdemers";
	$password = "CIS2304572";
	$dbname = "t0tallyk_dbkdemers7360";
	
	//Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	 
	//Check connection
	if ($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}//close if
	
	$update = "UPDATE Users SET status = 'occupied' WHERE id=$userID";
			
	$conn->query($update);
	
	$sql = "SELECT * FROM Users where id=$userID";
	 
	$result = $conn->query($sql);

	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$object = array('id'=> $row["id"], 'status' => $row["status"]);
			
			echo $object["id"] . "~" . $object["status"] . "@";
		}//close while
	}//close if
	else{
		echo "0 results";
	}//close else
	
	$conn->close();
?>


