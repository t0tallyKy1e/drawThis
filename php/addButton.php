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
	
	$sql = "SELECT * FROM Users where status = 'online'";
	 
	$result = $conn->query($sql);
	
	$string = "<script type='text/javascript' src='js/joinUser.js'></script><select id='users'>";

	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$object = array('id'=> $row["id"], 'status' => $row["status"]);
			
			$ID = $row["id"];
			
			$string = $string . '<option value=' . $object["id"] . '>' . 'User ' . $object["id"] . '</option>';
			
			
		}//close while
		
		$string = $string . '</select>';
		
		echo $string;
	}//close if
	else{
		echo "0 results";
	}//close else
	
	$conn->close();
?>
