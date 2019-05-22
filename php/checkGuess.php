<?php
	/*
		Kyle Demers
		04/19/2016
		Final Project - checks if the contestant guessed the right answer
	*/
	
	$servername = "localhost";
	$username = "t0tallyk_kdemers";
	$password = "CIS2304572";
	$dbname = "t0tallyk_dbkdemers7360";
	
	$info = $_POST;
	
	$user = $info[id];
	$opp = $info[oppid];
	
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
			$answer = array('word'=>$row['word'], 'guess'=>$row['guess']);
		}//close while
	}//close if
	else{
		;//NoP
	}//close else
	
	if($answer[word] == $answer[guess]){
		echo 'User ' . $opp . ' is the winner! ';
	}//close if
	else{
		echo 'User ' . $opp . ' guessed ' . $answer[guess];
	}//close else

	$conn->close();
?>