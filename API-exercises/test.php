<?php 
	#require_once 'RESTful.php';
​
	$response = curl_get("http://localhost/PHP/API/index.php");
​
	// var_dump($response);
​
	$result = json_decode($response);
​
	foreach($result as $row){
		echo $row->vorname. " <img src='".$row->foto. "'> ".$row->firma."<br>";
	}
​
​
?>