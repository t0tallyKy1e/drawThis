<?php
	/*
		Kyle Demers
		Web Dev 2
		drawThis - updates game status of users and gives them a role
	*/

	$data = $_POST;
	$userID = $data[id];
	$oppID = $data[oppid];
	
	$servername = "localhost";
	$username = "t0tallyk_kdemers";
	$password = "CIS2304572";
	$dbname = "t0tallyk_dbkdemers7360";
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	 
	if ($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}//close if
	
	if($oppID > $userID){
		$larger = $oppID;
		$smaller = $userID;
	}//close if
	else{
		$larger = $userID;
		$smaller = $oppID;
	}//close else
	
	$gameID = $smaller . $larger;
	
	//populate game id
	$generateGame = "REPLACE INTO Games (game, id)
					VALUES ('$gameID', '$userID')";
	
	$conn->query($generateGame);
	
	$artist = 'artist';
	
	//check if someone is already artist
	$checkUserStatus = "SELECT * FROM Games WHERE game = '$gameID' AND id = '$oppID'";
		
	$results = $conn->query($checkUserStatus);
	$row = $results->fetch_assoc();					
	if($row["status"] === 'artist'){
		$status = 'contestant';
	}//close if
	else{
		$status = 'artist';
	}//close else
	
	//set status depending on what was found
	$changeUserStatus = "UPDATE Games SET status = '$status'
						WHERE id = '$userID' AND game = '$gameID'";
	
	$conn->query($changeUserStatus);
	if($status == 'artist'){
		echo $status . '<script type="text/javascript" src="js/display.js"></script><script type="text/javascript" src="js/checkGuess.js"></script><script type="text/javascript" src="js/saveCanvas.js"></script><script type="text/javascript" src="js/saveCanvas.js"></script><style>#playerArea{display:none;}#drawSpace{display: inline;}</style>';
	}//close if
	else{
		echo $status . '<script type="text/javascript" src="js/validateGuess.js"></script><script type="text/javascript" src="js/checkCategory.js"></script><script type="text/javascript" src="js/getCanvas.js"></script><style>#clear{display:none;}#drawSpace{display: none;}</style>';
	}//close else
	
	$conn->close();
?>




















>>>>>>> 47b237cf5d9fc3438feec68e6923b86c803a4eb1
