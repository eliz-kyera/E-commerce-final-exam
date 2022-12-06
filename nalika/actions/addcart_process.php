<?php

include_once("../controllers/cart_controller.php");
include_once("../controllers/product_controller.php");
// Retrieves the brand name and passes it into the add brand controller
session_start();

if (isset($_GET["product_id"])) {
    $cid = $_SESSION['customer_id'];
    $pid = $_GET['product_id'];
    $ip_address = $_SERVER["REMOTE_ADDR"];

    $duplicate_check = duplicate_cart_ctrl($pid, $cid,);

    if (count($duplicate_check) == 0) {
        $check = add_cart_ctrl($pid, $ip_address, $cid);
        if ($check) {
            header('Location: ../view/shop.php');
        } else {
            echo "cart insertion failed";
        }
    }
}


if (isset($_GET['incID'])) {
    $product_id = $_GET['incID'];
    $cid = $_SESSION['customer_id'];
    // echo $product_id;

    // update the original quantity in the cart
    $oneProduct = select_one_cart_ctr($cid, $product_id);
    // print_r($oneProduct);
    $oldQty = $oneProduct['qty'];
    $newQty = $oldQty + 1;
    $update_qty = update_cart_qty_ctrl($product_id, $cid, $newQty);
    if($update_qty){
        // echo "worked";
        header('Location: ../view/cart.php');
    }

}

if (isset($_GET['decID'])) {
    $product_id = $_GET['decID'];
    $cid = $_SESSION['customer_id'];
    // echo $product_id;
    // update the original quantity in the cart
    $oneProduct = select_one_cart_ctr($cid, $product_id);
    // print_r($oneProduct);
    $oldQty = $oneProduct['qty'];
    $newQty = $oldQty - 1;
    if($oldQty <= 1){
        $newQty = 1;
        $update_qty = update_cart_qty_ctrl($product_id, $cid, $newQty);
        header('Location: ../view/cart.php');

    }else{
        $update_qty = update_cart_qty_ctrl($product_id, $cid, $newQty);
        if($update_qty){
            // echo "worked";
            header('Location: ../view/cart.php');
        }
    }
    // echo $newQty;
    // run the update query
}


// else if(isset($_GET['subtract'])){
//     $reduce =  reduce_cart_qty($pid, $cid);
//     if($reduce){
//         header('Location: ../view/cart.php');
//         return;
//     }

// }

// else{
//     $update_check = update_cart_qty_ctrl($pid, $cid);
//     if ($update_check) {
//         if(isset($_GET['addbutton'])){
//             echo '<script>alert("It has been added")</script>';
//             header('Location: ../view/cart.php');
//             return;
//         }
//         /* echo "Brand name inserted successfully"; */
//        header('Location: ../view/shop.php');
//     }
//     else{
        
//         echo "cart insertion failed";
//     }
// }

       
// }
