<?php

$user = $_COOKIE['user'];
$admin = $_COOKIE['is_admin'];

$servername = "127.0.0.1";
$username = "root";
$password = "Gl0rf1&d3l";
$dbname = "spark_nightclub";

 $conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die ("Connection faliled: " . $conn->connect_error);
}

$query_all = "SELECT * FROM newsletter_subscribers";

$result = $conn->query($query_all);

$users = [];
$all_emails = [];

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $user = [
      $row["name"],
      $row["email"],
      $row["admin"]
    ];
    array_push($users, $user);
    array_push($all_emails, $row["email"]);
  }
}

function readUsers($users) {
  foreach ($users as $user) {
    if ($user[2] == 1) {
      $user[2] = '<i class="fas fa-check"></i>';
    } else {
      $user[2] = "<i class='fas fa-times'></i>";
    }

    echo "
      <tr>
        <td>$user[0]</td>
        <td>$user[1]</td>
        <td>$user[2]</td>
      <tr>
    ";
  }
};

$title = $_POST['title'];
$content = wordwrap($_POST['content'], 70);

if ($title && $content) {
  foreach ($all_emails as $email) {
    mail($email, $title, $content);
  }
}


require 'manage.view.php';
