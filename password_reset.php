<?php
    session_start();
    include("config.php");
    echo "email";
    echo $_SESSION['email'];
    $_SESSION['pwd_status']="";
    if(isset($_POST['create_pass'])){   
      $password1 = mysqli_real_escape_string($db, $_POST['password_1']);
      $password2 = mysqli_real_escape_string($db, $_POST['password_2']);
      if ($password1 != $password2) {
        array_push($errors, "The two passwords do not match");
      }
      else if($password1 == $password2){
        $email=$_SESSION['email'];
        $password = md5($password1);
        $query = "UPDATE users set password='$password' where email='$email ";
        mysqli_query($db, $query);
        echo "sucess";
        $_SESSION['pwd_status']="Password Updated Successfully";
      }
      else{
        array_push($errors, "Something went wrong");
      }
    }

    
?>
<!DOCTYPE html>
<!DOCTYPE HTML PUBLIC “-//W3C//DTD HTML 4.01//EN”
“http://www.w3.org/TR/html4/strict.dtd">
<html>
<meta name="viewport" 
content="width=device-width, initial-scale=1.0">
<head>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <title>Login</title>
</head>

<body>
  <div class="main">
    <p class="sign" >Create New Password</p>
    <form class="form1" method="post" action="" name="password-form">
      <input class="un " type="password" name="password_1" placeholder="New Password" required>
      <input class="un" type="password" name="password_2" placeholder="Confirm Password" required>
      <button class="submit" type="submit" name="create_pass" value="create_pass">Create</button>     
      <a class="submit" href="login.php">Cancel</a>
      <?php if($_SESSION['pwd_status']) : ?>
          <p></p>
          <p class="forgot"><?php echo $_SESSION['pwd_status'] ?></p>
          <a class="submit" href="login.php">Login Now</a>
      <?php endif?>
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