<?php

if (isset($_GET['farWalk'])) {
  // 0 - Sunday, 6 - Saturday
  $dayofweek = date('w');
  $farwalk = $_GET['farWalk'];
  $outside;

  $json = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Winnipeg&appid=dbc9e48ec942c5885533b9610173aa4d');
  $jsonWeatherDecoded = json_decode($json,true);
  $weatherToday = $jsonWeatherDecoded['weather'][0]['main'];
}else{
    // Fallback behaviour goes here
}


?>
<!DOCTYPE html>
<html lang="en">
  <?php include 'header.php' ?>
  <body>
    <p><?= $weatherToday ?></p>
    <p><?= $dayofweek ?></p>
  </body>
</html>