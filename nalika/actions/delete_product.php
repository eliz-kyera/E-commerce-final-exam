<?php
require("../controllers/product_controller.php");

// get item to delete
$delcat = $_GET['pid'];



//delete item
$delete = delete_products($delcat);

if ($delete){
    header("location: ../view/product-list.php");
}else{
    echo "Delete failed";
}


 ?>