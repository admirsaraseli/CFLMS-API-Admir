
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
   <style>
       .card-body:hover .card-text {
           display: block;
       }
       .card-body .card-text {
           display: block;
       }
   </style>
</head>
<body>
   <div class="container">
       <div class="row">
           <?php
           require_once 'RESTful.php';
           $random = rand(0, 2);
           $cities = array("37.8267,-122.4233", "42.3601,-71.0589", "48.20849,16.37208");
           foreach ($cities as $city) {
               $url = 'https://api.darksky.net/forecast/e329256a741df2bcccffedd3600287c2/' . $city . '?exclude=minutely,hourly,daily,alerts,flags';
               $result = file_get_contents($url);
               $weather = json_decode($result);
               $fahrenheit = $weather->currently->temperature;
               $result = round(($fahrenheit - 32) * (5 / 9), 2);
               echo "
                   <div class='card text-center text-white bg-primary' style='width: 18rem; height: 10rem; font-size: 1.2rem'>
                   <p class='card-title'> {$weather->timezone} </p>
                   <div class='card-body'>                
                       <p class='card-text hide'> {$weather->currently->summary} </p>
                       <p class='card-text hide'>{$result}°C</p>
                   </div>
                   </div>
                   ";
           }
           ?>
       </div>
   </div>
</body>
</html>