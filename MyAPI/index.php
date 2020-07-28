<?php 
	$servername = "localhost"; // right connection 
	$username = "root";
	$password = "";
	$dbname = "cr11_admirsaraseli_petadoption";
	// Create the DB connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check the DB connection
	if (!$conn) {
	 	die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "SELECT * FROM animals";
	$result = mysqli_query($conn,$sql);
	$rows = $result->fetch_all(MYSQLI_ASSOC);
	$string = json_encode($rows);
	echo $string;
?>