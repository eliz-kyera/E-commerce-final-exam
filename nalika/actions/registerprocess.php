<?php
require("../controllers/customer_controller.php");

if (isset($_POST["submit"])) {
    $name = $_POST['fullname'];
    
    $email = $_POST['email']; 
    $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
    if (!preg_match ($pattern, $email) ){  
    $ErrMsg = "Email is not valid.";  
            echo $ErrMsg;  
} else {  
    echo "Your valid email address is: " .$email;  
}  
    $password = $_POST['password'];
    $country=$_POST['country'];
    $city= $_POST['city'];
    $contact = $_POST['contact'];
    if (!preg_match ("/^[0-9]*$/", $contact) ) {  
        $ErrMsg = "Only numeric value is allowed.";  
        echo $ErrMsg;  
    } else {  
        echo $contact;  
    }  

 

    // encryption of password using hash.
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // check whether function works  This is a controller 
    $check = add_customer_ctrl($name, $email, $hash, $country, $city, $contact);

    if ($check) {
        echo "Registration Successful";
        header("Location: ../view/login.php");
    }else{
        echo "not working";
    }

}


?>