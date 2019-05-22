<?php
	/*
		Kyle Demers
		04/19/2016
		Final Project - PHP get random subject from Subjects table
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
	
	$newsql = "SELECT * FROM Subjects";
	$length = $conn->query($newsql);
	
	$dblength = $length->num_rows;
	
	$number = rand(1, $dblength);
	
	$sql = "SELECT * FROM Subjects WHERE id = $number";
	 
	$result = $conn->query($sql);

	if ($result->num_rows > 0){
		if($row = $result->fetch_assoc()){
			$object = array('word'=> $row["word"], 'category' => $row["category"], 'id'=> $row['id']);
		}//close while
	}//close if
	else{
		echo "0 results";
	}//close else
	$conn->close();
	
	
	//add word and category to table
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
	
	$word = $object[word];
	$category = $object[category];
			
	$wordcat = new mysqli($servername, $username, $password, $dbname);
	
	if ($wordcat->connect_error){
		die("Connection failed: " . $wordcat->connect_error);
	}//close if
	
	$addWord = "UPDATE Games SET word='$word' WHERE game='$gameID'";
	
	if($wordcat->query($addWord) === TRUE){
		echo $word . "~";
	}
	else{
		echo 'broken word';
	}
	
	$addCategory = "UPDATE Games SET category='$category' WHERE game='$gameID'";
	
	if($wordcat->query($addCategory) === TRUE){
		echo $category . "@" . $object[id] . "!";
	}
	else{
		echo 'broken category';
	}
	
	$wordcat->close();
?>