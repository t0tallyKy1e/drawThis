<?php
	$config = parse_ini_file("../../../../db_admin.ini");

	$servername = $config['server_name'];
	$dbname = $config['db_name'];
	$username = $config['db_username'];
	$password = $config['password'];
	
	//Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	 
	//Check connection
	if ($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}//close if
	
	$insert = "REPLACE INTO Users (id, status)
			VALUES (NULL, 'online')";
			
	$conn->query($insert);
	
	$sql = "SELECT * FROM Users ORDER BY id DESC LIMIT 1";
	 
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


