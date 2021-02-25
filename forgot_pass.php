<?php
  session_start();
  include("config.php");
  $_SESSION['forgot'] = "";
  if(isset($_POST['forgot'])){
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);    
    $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['email'] === $email) {
      $otp=rand(100000,999999);
      $query1 = "INSERT INTO users_otp (email, otp) VALUES('$email', 000000)";
      $query2 = "REPLACE INTO users_otp (email, otp) values ('$email',$otp)";
      mysqli_query($db, $query1);
      mysqli_query($db, $query2);
      $_SESSION['email'] = $email;
      $_SESSION['otp'] = $otp;
      $_SESSION['forgot'] = "forgot";

      $to = $email;
      $subject = "OTP for Password Reset Request";
      $txt = " Hi,\n Please reset the password by using the below OTP:\n  $otp";
      $headers = "From: sender\'s email";
      if(mail($to,$subject,$txt,$headers)){
        $_SESSION['mail_status']= "Mail sent successfully";
      }
      else{
        $_SESSION['mail_status']= "Error Sending mail";
      }
      //header("location: mail.php");
    }
  }
    else  {
      array_push($errors, "Email Doesn't Exists-- Please Register");
    }
  
}
if(isset($_POST['otp_submit'])){   
  echo $_SESSION['email'];    
  if ($_SESSION['otp'] == $_POST['otp']){
      header("location: password_reset.php");
  }
  else{
    array_push($errors, "Invalid OTP");
  }

}

?>
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
  <script src="scripts.js"></script>
  <title>Forgot Password</title>
</head>

<body>
  <div class="main">
    <p class="sign">Forgot Password</p>
    <form class="form1" method="post" action="" name="forgot-form">
      <input class="un " id="reset_email" type="email" name="email" placeholder="email" >
      <button id="reset" class="submit" type="submit" name="forgot" value="forgot" >RESET Password</button>
      
      <?php if($_SESSION['forgot'] == "forgot") : ?>
          <p></p>
          <script >setVisibility('reset','none');setVisibility('reset_email','none');</script>
          <input class="un " type="number" name="otp" placeholder="OTP" required>
          <button class="submit" type="submit" name="otp_submit" value="otp">SUBMIT OTP</button>
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
    </div>
     
</body>

</html>