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
 <form action="../actions/addcart_process.php" method="get"> 
    <div class="form sign-in">
     
      <h2>Add inscription</h2>
      <!-- <p>Not registered? <a href="./register.php">Create an account</a></p> -->
      <label>
        <small>Product</small><br>
        <span><?php echo $_GET['product_name'] ?> </span>
        <input type="hidden" name="product_id" value="<?php echo $_GET['product_id'] ?>"  required>
      </label>
      <label>
        <span>Inscription</span>
        <input type="text" name="insc" value="<?php echo $_GET['insc']; ?>" required>
      </label>
      <label>
        <span>Color</span>
        <input type="text" name="col" required>
      </label>
      <button class="button-33" name= "update_insc" type="submit" role="button">UPDATE</button>
      <!-- <p class="forgot-pass">Forgot Password ?</p> -->
</form>

      
    </div>

    <div class="sub-cont">
      <div class="img">
        <div class="img-text m-up">
          <!-- <h2>New here?</h2> -->
          <p>Add prefered inscription for your product!</p>
          <br>
          <br>
          <!-- <a href="register.php">
          <button class="button-33" role="button">Sign Up</button> -->
        </a>
         
        </div>
       
        
        <!-- <div class="img-btn">
        <a href="register.php" class="button">Sign Up</a> -->
         
        </div>
      </div>
</html>