<?php

require('resource/connect.php');

$message = '';
$matches = [];

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
  if ($_GET['walkFar'] === 'yes') {
    $walkfar = true;
  }

  // check if it's the weekend
  if ($dayofweek == 0 || $dayofweek == 6) {
    //$weekend = true;
  }

  // pick best location
  if ($weekend) {
    // tell user it's the weekend
    $message = "It's the weekend, you shouldn't be at work!";
  } else {
    if ($outside) {
      if ($walkfar) { // outside and far
        $query = "SELECT * FROM options WHERE outside = 1";
        $statement = $db->prepare($query);
        $statement->execute();
        $matches = $statement->fetchAll();
        
      } else { // outside, not far
        $query = "SELECT * FROM options WHERE outside = 1 AND far = 0";
        $statement = $db->prepare($query);
        $statement->execute();
        $matches = $statement->fetchAll();
      }
    } else {
      if ($walkfar) { // not outside, far
        $query = "SELECT * FROM options WHERE outside = 0";
        $statement = $db->prepare($query);
        $statement->execute();
        $matches = $statement->fetchAll();
      } else { // not outside or far
        $query = "SELECT * FROM options WHERE outside = 0 AND far = 0";
        $statement = $db->prepare($query);
        $statement->execute();
        $matches = $statement->fetchAll();
      }
    }

    // pick a random selection from the matching locations
    $pick = $matches[array_rand($matches)];
    $message = "How about " . $pick['name'] . " today?";
  }


} else { // if not redirect to homepage
    header("Location: index.php");
}


?>
<!DOCTYPE html>
<html lang="en">
  <?php include 'header.php' ?>
  <body>
    <div class="container">
      <h2><?= $message ?></h2>
      <a href="index.php" class="btn btn-info"><i class="material-icons">keyboard_arrow_left</i> Go Back</a>      
    </div>
  </body>
</html>