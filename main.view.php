  <div class="img">
    <div class="body">
      <h2>Welcome to the Spark!</h2>
      <p><?= "Logged in as $email." ?></p>
      <?php if ($admin == 1) : ?>
        <p>You have been identified as an admin.</p>
        <a href="/manage.php" class="enter">View console.</a>
      <?php endif ?>
    </div>
  </div>
  <div class="footer">
    <p><strong>Hey!</strong> Are you signed up for our newsletters? <a href="/subscriptions.php">Manage My Subscriptions</a></p>
  </div>
</body>
</html>