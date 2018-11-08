<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <style>
  .fa-check {
    color: green;
  }

  .fa-times {
    color: red;
  }
  </style>
  <title>SN Console</title>
</head>
<body>
  <?php if ($admin == 1) : ?>
    <div class="jumbotron">
      <h1 class="display-4">Manager's Console</h1>
      <a href="">
        <button class="btn btn-primary">View Users</button>
      </a>
      <a href="">
        <button class="btn btn-success">Create a Newsletter</button>
      </a>
    </div>
    <div class="container">
      <table class="table">
        <thead>
          <th>Username</th>
          <th>Email</th>
          <th>Is Admin</th>
        </thead>
        <tbody>
          <tr>
            <?php readUsers($users) ?>
          </tr>
        </tbody>
      </table>
      <form action="" method="POST">
        <h3>Send out a Promo</h3>
        <div class="form-group">
          <label for="title">Newsletter Title</label>
          <input type="text" name="title" id="title" class="form-control">
        </div>
        <div class="form-group">
          <label for="content">Content</label>
          <textarea name="content" id="content" class="form-control"></textarea>
        </div>
        <button class="btn btn-success" id="send">Send</button>
      </form>
    </div>    
  <?php else : ?>
    <div class="jumbotron">
      <h1 class="display-3">WHOAH</h1>
      <p class="lead">Unauthorized user up in my grill!</p>
      <a href="/main.php">
        <button class="btn btn-primary">Go Back To Where I belong</button>
      </a>
    </div>
  <?php endif ?>
</body>
</html>