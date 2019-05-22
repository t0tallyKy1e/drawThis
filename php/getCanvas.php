<?php
	/*
		Kyle Demers
		Web Dev 2
		drawThis - gets canvas from table
	*/
	
	$data = $_POST;
	
	$user = $data['id'];
	$opp = $data['oppid'];
	
	$servername = "localhost";
	$username = "t0tallyk_kdemers";
	$password = "CIS2304572";
	$dbname = "t0tallyk_dbkdemers7360";
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	 
	if ($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}//close if
	
	if($opp > $user){
		$larger = $opp;
		$smaller = $user;
	}//close if
	else{
		$larger = $user;
		$smaller = $opp;
	}//close else
	
	$gameID = $smaller . $larger;
		
	$sql = "SELECT * FROM Games WHERE game = '$gameID'";
	 
	$result = $conn->query($sql);

	if ($result->num_rows > 0){
		if($row = $result->fetch_assoc()){
			$object = array('image'=> $row["image"]);
			
			echo $object['image'];
		}//close while
	}//close if
	else{
		echo "0 results";
	}//close else
	
	$conn->close();
?>