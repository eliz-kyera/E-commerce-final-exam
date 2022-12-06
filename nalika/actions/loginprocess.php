<?php

require("../controllers/customer_controller.php");
require("../settings/core.php");


$errors = array();


if (isset($_POST["submit"])) {
    $cus_email =$_POST['email'];
    $password = $_POST['pass'];
   
    

    if(empty($cus_email)){
        array_push($errors, "Enter Email");
    }

    if(empty($password)){
        array_push($errors, "Enter Password");
    }

    $data = duplicate_email($cus_email);
    if (empty($data)) {
        array_push($errors, "Invalid Email or Password"); 
    }

   
    if (empty($errors)) {
      
        $logincheck = return_customer_ctrl($cus_email,$password);

        echo $logincheck; 

        if ($logincheck){
            echo "hello";
            
            $results = returncustomer($cus_email);
            echo $results['user_role']; 
            $_SESSION['name'] = $results['customer_name'];
            $_SESSION['customer_id'] = $results['customer_id'];
            $_SESSION['customer_email'] = $results['customer_email'];
            $_SESSION['role'] = $results['user_role'];
            $_SESSION['loggedin']=true;
          
    
            if($_SESSION['role'] === '2'){
                header("Location: ../../index.php");
            }else{
            

            header("Location: ../view/dashboard.php");
            }
    
        }else{}


    } else {
        print_r($error);
        $_SESSION['errors'] = $errors;
        header('location: ../view/login.php'); 
    }
    
    


}

?>