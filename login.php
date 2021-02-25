<?php
    @session_destroy();
    include("server.php")
?>
<!DOCTYPE html>
<!DOCTYPE HTML PUBLIC “-//W3C//DTD HTML 4.01//EN”
“http://www.w3.org/TR/html4/strict.dtd">
<html>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <head>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <title>Login</title>
  </head>

  <body>
    <div class="main">
      <p class="sign" >Sign in</p>
      <form class="form1" method="post" action="" name="signin-form">
        <input class="un " type="text" name="username" placeholder="Username" required>
        <input class="un" type="password" name="password" placeholder="Password" required>
        <button class="submit" type="submit" name="login" value="login">Sign in</button>
        <p class="forgot" ><a href="forgot_pass.php">Forgot Password?</p>
      </form>     
      <?php  if (count($errors) > 0) : ?>
        <div class="error">
  	      <?php foreach ($errors as $error) : ?>
  	        <p class="forgot"><?php echo $error ?></p>
  	      <?php endforeach ?>
        </div>
      <?php  endif ?>
    </div>
  </body>

</html>