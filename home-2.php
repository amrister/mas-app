<?php

  if($_SERVER['REQUEST_METHOD']=="POST"){
    $location = $_POST['location'];
  }

  // using opencagedata api to get lat and long
  $req_url = 'https://api.opencagedata.com/geocode/v1/json?q='.urlencode($location).'&key=ecba72dd6d634610b646990f04e19513';
  $req_json = file_get_contents($req_url);
  $req_array = json_decode($req_json, true);
  $lat = $req_array['results'][0]['geometry']['lat'];
  $lng = $req_array['results'][0]['geometry']['lng'];

  // using Dark Sky api to Weather Services
  $wthr_url = 'https://api.darksky.net/forecast/bba9f46caea2c3dae0e3dbc27526ff3c/'.$lat.','.$lng;
  $wthr_json = file_get_contents($wthr_url);
  $wthr_array = json_decode($wthr_json, true);
  $cur_temp = $wthr_array['currently']['temperature'];
  $cur_prc= $wthr_array['currently']['summary'];
  $cur_pres= $wthr_array['currently']['pressure'];
  $cur_wind= $wthr_array['currently']['windSpeed'];

  $daily_hTemp = $wthr_array['daily']['data'][0]['temperatureHigh'];
  $daily_lTemp = $wthr_array['daily']['data'][0]['temperatureLow'];
  $daily_prc= $wthr_array['daily']['data'][0]['summary'];
  $daily_pres= $wthr_array['daily']['data'][0]['pressure'];
  $daily_wind= $wthr_array['daily']['data'][0]['windSpeed'];

  $images = array();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <div class="header">
      <div class="overlay">
        <div class="left">
          <h1>  Want to travel? <br>
                Collect info about a place you'd like to travel now!!</h1>
        </div>
        <div class="right">
          <form class="form" action="home-2.php" method="post">
            <select class="" name="location" required>
              <option>Cairo</option>
              <option>Toronto</option>
              <option>Paris</option>
              <option>London</option>
              <option>Istanbul</option>
              <option>Madrid</option>
              <option>Rio de Janeiro</option>
              <option>Berlin</option>
              <option>New York</option>
              <option>Moscow</option>
              <option>Beirut</option>
              <option>Chicago</option>
              <option>Tokyo</option>
              <option>Mexico</option>
              <option>Delhi</option>
            </select>
            <input type="submit" name="" value="Submit">
          </form>
        </div>
        <div class="arrow">
          >>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="head text-center">
        <h1>Photos From <?php echo $location; ?></h1>
      </div>
      <div class="banners">
        <div class="images">
          <div class="image">
            <img src="<?php echo $images[0];?>" alt="">
          </div>
          <div class="image">
            <img src="<?php echo $images[1];?>" alt="">
          </div>
          <div class="image">
            <img src="<?php echo $images[2];?>" alt="">
          </div>
        </div>
        <div class="images">
          <div class="image">
            <img src="<?php echo $images[3];?>" alt="">
          </div>
          <div class="image">
            <img src="<?php echo $images[4];?>" alt="">
          </div>
          <div class="image">
            <img src="<?php echo $images[5];?>" alt="">
          </div>
        </div>
      </div>
      <div class="weather">
        <div class="head text-center">
          <h1>Wheather</h1>
        </div>
        <div class="details">
          <div class="text">
            <h2>Currently</h2>
            <ul>
              <li>precipType: <span><?php echo $cur_prc; ?></span></li>
              <li>Temperature: <span><?php echo $cur_temp; ?> </span>&nbsp;&nbsp; Degrees Celsius.</li>
              <li>windSpeed:  <span><?php echo $cur_wind; ?></span>&nbsp;&nbsp; Meters per second.</li>
              <li>Pressure: <span><?php echo $cur_pres; ?></span>&nbsp;&nbsp;Hectopascals.</li>
            </ul>
          </div>
          <div class="text">
            <h2>Daily</h2>
            <ul>
              <li>precipType: <span><?php echo $daily_prc; ?></span></li>
              <li>Temperature High: <span> <?php echo $daily_hTemp; ?></span> &nbsp;&nbsp; Degrees Celsius.</li>
              <li>Temperature Low:   <span><?php echo $daily_lTemp; ?></span>&nbsp;&nbsp; Degrees Celsius.</li>
              <li>windSpeed:   <span><?php echo $daily_wind; ?></span>&nbsp;&nbsp; Meters per second.</li>
              <li>Pressure:  <span><?php echo $daily_pres; ?></span>&nbsp;&nbsp;Hectopascals.</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="footer">
      <h3>Thanks For Using our Service, Hope to see you again</h3>
    </div>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
