<?php
require("../controllers/customer_controller.php");

if (isset($_POST["submit"])) {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $country=$_POST['country'];
    $contact = $_POST['contact'];
    

 

    // encryption of password using hash.
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // check whether function works  This is a controller 
    $check = add_customer_ctrl($name, $email, $hash, $country,$contact);

    if ($check) {
        echo "Registration Successful";
        header("Location: ../view/login.php");
    }else{
        echo "not working";
    }

}


?>