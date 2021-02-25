<?php include("server.php"); ?>
<!DOCTYPE HTML PUBLIC “-//W3C//DTD HTML 4.01//EN”
“http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <title>Register User</title>
</head>
<body>
  <div class="main">
    <p class="sign" >Register User</p>
    <form class="form1" method="post" name="register-form">
      <label class='forgot'>Username:</label>
      <input class="un " type="text" name="username" placeholder="Username" required>
      <label class='forgot'>Username:</label>
      <input class="un" type="email" name="email" placeholder="Email" required>
      <label class='forgot'>Username:</label>
      <select class="un" name="gender" required placeholder="Gender">
        <option ></option>
        <option value="Male" selected> male</option>
        <option value="Female">female</option>
      </select>
      <label class='forgot'>Username:</label>
      <input class="un" type="password" name="password_1" placeholder="Password" required>
      <label class='forgot'>Username:</label>
      <input class="un" type="password" name="password_2" placeholder="Re-type Password" required>
      <button class="submit" type="submit" name="register">Register</button>
      <a class="submit" href=login.php>Cancel</a>
      
    </form>            
    </div>
    <?php  if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
</body>

</html>