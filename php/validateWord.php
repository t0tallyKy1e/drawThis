<?php
	/*
		Kyle Demers
		04/19/2016
		Final Project - PHP validate word
	*/
	
	ini_set('display errors', 1);
	
	$servername = "localhost";
	$username = "t0tallyk_kdemers";
	$password = "CIS2304572";
	$dbname = "t0tallyk_dbkdemers7360";
	
	$info = $_POST;
	
	$word = $info[word];
	$category = $info[category];
	$length = strlen($word);
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}//close if
	 
	$stmt = $conn->prepare("INSERT INTO Subjects (word, category) VALUES (?, ?)");
	$stmt->bind_param("ss", $word, $category);
	
	if($length > 0){
		$stmt->execute();
		echo $word . " was added to the list of Subjects to be drawn.";
	}//close if
	else{
		echo 'Something went wrong!';
	}//close else

	$stmt->close();
	$conn->close();
?>