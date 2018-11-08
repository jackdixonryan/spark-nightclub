    <div class="body">
      <h4>You must be 21 years or older to enter.</h4>
      <form action="" method="POST">
        <div class="input-group">
          <label for="age">Select Your Age:</label>
          <input type="number" name="age" id="age" class="age-select">
        </div>
      </form>
      <?php if ($age >= 21) : ?>
        <a class="enter" href="/main.php">Go to Site</a>
      <?php endif ?>
    </div>

    <?php if ($email && $name && $email != "Invalid email format.") : ?>
      <div class="body">
        Thank you for signing up, <?= $name ?> You will receive an email at <?= $email ?>. Please resubmit the form if this is inaccurate.
      </div>
    <?php elseif ($name && $email == "Invalid email format.") : ?>
      <div class="body">
        The email address you submitted was invalid. Please try again.
      </div>
    <?php endif ?>
</div>

  <div class="footer">
    <p>Want our kicking newsletters?</p>
    <br>
    <form action="" method="POST" class="form">
      <div class="input-group">
        <label for="name" class="label">Name</label>
        <input type="text" name="name" id="name" class="input">
      </div>
      <div class="input-group">
        <label for="email" class="label">Email</label>
        <input type="text" name="email" id="email" class="input">
      </div>
      <button type="submit" id="sign-up">Sign Up</button>
    </form>
  </div>
</body>
</html>