<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Weather API</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container my-4 mx-auto">
	<?php

		require_once 'RESTful.php';
		$url = 'http://feeds.bbci.co.uk/news/technology/rss.xml';
		$response = curl_get($url);
		$xml = simplexml_load_string($response);
		echo "<h1>".$xml->channel->title."</h1><br>" ;
		foreach ($xml->channel->item as $item) {
			echo '<a href="'.$item->link.'" target="_blank">'.$item->title.'</a><br>';
		}

		$url = 'http://rss.cnn.com/rss/edition_technology.rss';
		$response = curl_get($url);
		$xml = simplexml_load_string($response);
		echo "<h1>".$xml->channel->title."</h1><br>" ;
		foreach ($xml->channel->item as $item) {
			echo '<a href="'.$item->link.'" target="_blank">'.$item->title.'</a><br>';
		}

		$url = 'http://api.serri.codefactory.live/random/';
		$response = curl_get($url);
		$joke = json_decode($response);
		echo $joke->joke;
		
	?>
	</div>
</body>
</html>