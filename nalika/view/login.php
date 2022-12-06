<!DOCTYPE html>
<html>
<head>
	<title>Login </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../../assets/css/logins.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
</head>
<body>
  <div class="cont">
 <form action="../actions/loginprocess.php" method="POST"> 
    <div class="form sign-in">
      <h2>Sign In</h2>
      <!-- <p>Not registered? <a href="./register.php">Create an account</a></p> -->
      <label>
        <span>Email Address</span>
        <input type="email" name="email" required>
      </label>
      <label>
        <span>Password</span>
        <input type="password" name="pass" required>
      </label>
      <button class="button-33" name= "submit" role="button">Sign In</button>
      <!-- <p class="forgot-pass">Forgot Password ?</p> -->
</form>

      <div class="social-media">
        <ul>
          <!-- <li><img src="images/facebook.png"></li>
          <li><img src="images/twitter.png"></li>
          <li><img src="images/linkedin.png"></li>
          <li><img src="images/instagram.png"></li> -->
        </ul>
      </div>
    </div>

    <div class="sub-cont">
      <div class="img">
        <div class="img-text m-up">
          <h2>New here?</h2>
          <p>Sign up and discover the best gift packages!</p>
          <br>
          <br>
          <a href="register.php">
          <button class="button-33" role="button">Sign Up</button>
        </a>
         
        </div>
       
        
        <!-- <div class="img-btn">
        <a href="register.php" class="button">Sign Up</a> -->
         
        </div>
      </div>