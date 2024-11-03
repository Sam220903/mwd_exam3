<?php
function connection($connection){
	define("UTF8",JSON_UNESCAPED_UNICODE);  
	$conn = new mysqli(
						$connection["servername"],
						$connection["username"], 
						$connection["password"],
						$connection["dbname"]
	);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$conn->set_charset("utf8mb4");
	return $conn;
}