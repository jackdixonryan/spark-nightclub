<?php

if (count($_COOKIE) == 0) {
  $email = "You appear to have cookies disabled on your browser. Please enable them and log in again if you wish to browse our site.";
}

if (isset($_COOKIE['user'])) {
  $email = $_COOKIE['user'];
}

$servername = "127.0.0.1";
$username = "root";
$password = "Gl0rf1&d3l";
$dbname = "spark_nightclub";

 $conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die ("Connection faliled: " . $conn->connect_error);
}
  
$check_admin = "SELECT * FROM newsletter_subscribers WHERE email = '$email'";

$result = $conn->query($check_admin);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    if ($row['admin'] == 1) {
      $admin = true;
    }
  };
}

setcookie('is_admin', $admin, time() + (86400 * 30). "/");

require "./navbar.view.php";
require "./main.view.php";
