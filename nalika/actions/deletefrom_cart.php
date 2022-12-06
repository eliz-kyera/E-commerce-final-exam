<?php
    require("../controllers/cart_controller.php");
    session_start();
    
    $cid = $_SESSION['customer_id'];
    $pid = $_GET['id'];
    
    $delete = delete_from_cart($cid,$pid) ;
    if($delete){
        header("location: ../view/cart.php");
    }else{
        echo "delete failed";
    }
    ?>