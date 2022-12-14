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
 <form action="../actions/registerprocess.php" method="POST"> 
    <div class="form sign-in">
    <h2>Sign Up</h2>
        <label>
          <span> Full Name</span>
          <input type="text" name="fullname" id="fullname" onkeyup="validateFullName(this)" required />
        </label>
        <p id="1" style="color: rgb(199,90,90);"></p>
        <label>
          <span>Email</span>
          <input type="email" name="email" id="email" onkeyup="validateEmail(this)" required />
        </label>
        <p id="2" style="color: rgb(199,90,90);"></p>
        
        <label>
          <span>Country</span>
          <input type="text" name="country" id="country" required onkeyup="validateCountry(this)" required />
        </label>
        <p id="4" style="color: rgb(199,90,90);"></p>
         <!-- <label>
          <span>City</span>
          <input type="text" name="city" id="city">
        </label>  -->
        <p id="5" style="color: rgb(199,90,90);"></p>
        <label>
          <span>Contact</span>
          <input type="text" name="contact" id="contact" required onkeyup="validatePhone(this)" required />
        </label> 
        <p id="6" style="color: rgb(199,90,90);"></p>
        <label>
          <span>Password</span>
          <input type="password" name="password" id="pass" required >
        </label>
        <label>
          <span>Confirm Password</span>
          <input type="password" name="password" id="pass1" required onkeyup="validatePassword()" required />
        </label>
       
        <button class="button-33" name= "submit" role="button">Sign Up</button>
    
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
          <h2>One of us?</h2>
          <p>If you already have an account, just sign in. We've missed you!</p>
          <br>
          <br>
          <a href="login.php">
          <button class="button-33" role="button">Sign In</button>
        </a>
        </div>
       
        </div>
       
         
        </div>
      </div>

       <!-- <form action="../actions/registerprocess.php" method="POST"> 
        <div class="form sign-up">
        <h2>Sign Up</h2>
        <label>
          <span>Name</span>
          <input type="text" name="fullname">
        </label>
        <label>
          <span>Email</span>
          <input type="email" name="email">
        </label>
        <label>
          <span>Password</span>
          <input type="password" name="password">
        </label>
        <label>
          <span>Country</span>
          <input type="text" name="country">
        </label>
         <label>
          <span>City</span>
          <input type="text" name="city" >
        </label> 
        <label>
          <span>Contact</span>
          <input type="tel" name="contact">
        </label> 
        <button class="button-33" name= "submit" role="button">Sign Up</button>
      </div>
    </div>
  </div> -->

<!-- 
  <div class="sub-cont">
      <div class="img">
        <div class="img-text m-up">
          <h2>New here?</h2>
          <p>Sign up and discover the best gift packages!</p>
        </div>
        <div class="img-text m-in">
          <h2>One of us?</h2>
          <p>If you already have an account, just sign in. We've missed you!</p>
        </div>
        <div class="img-btn">
          <span class="m-up">Sign Up</span>
          <span class="m-in">Sign In</span>
        </div>
      </div> -->

 <!-- <script type="text/javascript" src="../../assets/js/script.js"></script>  -->
 <script src= "../js/register.js"></script>
</body>
</html>