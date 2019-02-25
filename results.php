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
  $format = $req_array['results'][0]['formatted'];
  echo "Lat: ".$lat."<br>"."lng: ".$lng."<br>"."Format: ".$format."<br>";


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Api App</title>
    <link rel="stylesheet" href="css/master.css">
  </head>
  <body>
    <div class="results">
      <div class="banners">
        <div class="head text-center">
          <h1>Cairo</h1>
        </div>
        <div class="images">
          <div class="image">
            <img src="" alt="">
          </div>
          <div class="image">
            <img src="" alt="">
          </div>
          <div class="image">
            <img src="" alt="">
          </div>
        </div>
        <div class="images">
          <div class="image">
            <img src="" alt="">
          </div>
          <div class="image">
            <img src="" alt="">
          </div>
          <div class="image">
            <img src="" alt="">
          </div>
        </div>
      </div>
      <div class="weather">
        <div class="head text-center">
          <h1>Wheather</h1>
        </div>
        <div class="details">
          <ul>
            <li>Temp: </li>
            <li>Temp: </li>
            <li>Temp: </li>
          </ul>
          <ul>
            <li>Temp: </li>
            <li>Temp: </li>
            <li>Temp: </li>
          </ul>
        </div>
      </div>
    </div>
  </body>
</html>
