<?php
	/*
		Kyle Demers
		Web Dev 2
		drawThis - saves canvas to table
	*/

	$data = $_POST;
	
	$user = $data['id'];
	$opp = $data['oppid'];
	$image = $data['image'];
	
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
		
	$addImage = "UPDATE Games SET image='$image' WHERE game='$gameID'";
	
	$conn->query($addImage);
	
	$conn->close();
?>