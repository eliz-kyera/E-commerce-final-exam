<?php
require("../Controllers/product_controller.php");

//get item to delete
$delcat = $_GET['cid'];



//delete item
$delete = delete_category_name($delcat);

if ($delete){
    header("location: ../view/category.php");
}else{
    echo "Delete failed";
}


?>