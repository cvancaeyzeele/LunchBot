<?php

// check if value is set
if (isset($_GET['walkFar'])) {
  // 0 - Sunday, 6 - Saturday
  $dayofweek = date('w');
  $walkfar = false;
  $outside = false;
  $weekend = false;

  // get weather condition
  $json = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Winnipeg&appid=dbc9e48ec942c5885533b9610173aa4d');
  $jsonWeatherDecoded = json_decode($json,true);
  $weatherToday = $jsonWeatherDecoded['weather'][0]['id'];

  // decide best place for lunch based on input
  // if weather conditions involve rain, outside = false
  // if day of week is 0 or 6, display message that it's the weekend
  
  // first check weather conditions - 800s means clear/cloudy sky
  if ($weatherToday >= 800 && $weatherToday < 900) {
    $outside = true;
  }

  // check selection for walkFar
  if ($_GET['walkFar'] === yes) {
    $walkfar = true;
  }

  // check if it's the weekend
  if ($dayofweek == 0 || $dayofweek == 6) {
    $weekend = true;
  }

  

}else{ // if not redirect to homepage
    header("Location: index.php");
}


?>
<!DOCTYPE html>
<html lang="en">
  <?php include 'header.php' ?>
  <body>
    <p><?= $weatherToday ?></p>
    <p><?= $dayofweek ?></p>
    <p><?= $walkfar ?></p>
  </body>
</html>