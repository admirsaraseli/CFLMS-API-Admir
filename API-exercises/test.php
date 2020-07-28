<?php 
	require_once 'RESTful.php';
	$response = curl_get("http://localhost/API/MyAPI//index.php");
	$result = json_decode($response);
	foreach($result as $row){
		echo $row->name. " <img src='".$row->image. "'> ".$row->type."<br>";
	}
?>