<?php
require("../controllers/customer_controller.php");

if (isset($_POST["submit"])) {
    $name = $_POST['fullname'];

    $email = $_POST['email'];
   
    $password = $_POST['password'];
    $number = preg_match('@[0-9]@', $password);
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if (strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
        echo "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
    } else {
        echo "Your password is strong.";
    }
    $country = $_POST['country'];
    $city = $_POST['city'];
    $contact = $_POST['contact'];




    // encryption of password using hash.
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // check whether function works  This is a controller 
    $check = add_customer_ctrl($name, $email, $hash, $country, $city, $contact);

    if ($check) {
        echo "Registration Successful";
        header("Location: ../view/login.php");
    } else {
        echo "not working";
    }
}
