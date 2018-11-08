<?php

// Server configuration:
$servername = "127.0.0.1";
$username = "root";
$password = "Gl0rf1&d3l";
$dbname = "spark_nightclub";

 $conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die ("Connection faliled: " . $conn->connect_error);
}

$age = htmlspecialchars($_POST['age']);
$name = htmlspecialchars($_POST['name']);
$email = $_POST['email'];
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format.";
  $email = $emailErr;
}

$msg = "Welcome to your new life, $name. You have signed up for the monthly Spark Nightlife newsletter. If you would like to opt out of this service, I'm afraid I don't know how to do that yet. However, your email will be added posthaste to a userbase so enjoy knowing that a club owner now has the ability to spam your inbox at any time and there's nothing you can do about it.";

$msg = wordwrap($msg, 70);

if ($name && $email != "Invalid email format.") {
  //  mail($email, "Welcome to the Night!", $msg);

  setcookie("user", $email, time() + (86400 * 30), "/");
  
  $add_user = "INSERT INTO newsletter_subscribers (name, email) VALUES ('$name', '$email')";

  if ($conn -> query($add_user) === TRUE) {
    echo "New Record Created!";
  } else {
    echo "
      <div class='pop-up'>
        <h3>User Already Created</h3>
        <hr> 
        <p>You have already elected to receive newsletters. If you would like to opt out, click <a href='#'>here</a></p>
      </div>
    ";
  }



  $conn->close();

}



function checkAge($age) {
  if ($age >= 21) {
    return "
      <div>
        <button class='enter'>Enter</button>
      </div>
    ";
  } else {
    return "
      <div>
        <p>You are not old enough to enter.</p>
      </div>
    ";
  }
}

require('navbar.view.php');
require 'index.view.php';