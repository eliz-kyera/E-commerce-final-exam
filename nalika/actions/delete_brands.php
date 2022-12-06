<?php
require("../controllers/product_controller.php");

//get item to delete
$delbrand = $_GET['bid'];



//delete item
$delete = delete_brand($delbrand);

if ($delete){
    header("location: ../view/brand.php");
}else{
    echo "Delete failed";
}


?>
 