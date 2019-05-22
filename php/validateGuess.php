<?php
	/*
		Kyle Demers
		04/19/2016
		Final Project - PHP validate guess
	*/
	
	$servername = "localhost";
	$username = "t0tallyk_kdemers";
	$password = "CIS2304572";
	$dbname = "t0tallyk_dbkdemers7360";
	
	$info = $_POST;
	
	$user = $info[user];
	$opp = $info[opp];
	$guess = $info[answer];
	
	if($user > $opp){
		$gameID = $opp . $user;
	}//close if
	else{
		$gameID = $user . $opp;
	}//close else
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}//close if
		
	$sql = "SELECT * FROM Games WHERE game = $gameID";
	 
	$result = $conn->query($sql);

	if ($result->num_rows > 0){
		if($row = $result->fetch_assoc()){
			$answer = $row["word"];
		}//close while
	}//close if
	else{
		;//NoP
	}//close else
	
	$newsql = "UPDATE Games SET guess = '$guess' WHERE game = '$gameID'";
	$conn->query($newsql);
	
	if($answer === $guess){
		echo $user . " is the winner! " . "The correct answer was: " . $guess;
	}//close if
	else{
		echo 'Try again please!';
	}//close else

	$conn->close();
?>