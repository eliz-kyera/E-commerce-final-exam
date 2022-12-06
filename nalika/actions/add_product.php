<?php
require("../controllers/product_controller.php");
require("../functions/functions.php");



if(isset($_POST['submit'])){
    $pcategory = $_POST['category'];
    $pbrand = $_POST['brand'];
    $ptitle = $_POST['ptitle'];
    $pprice = $_POST['price'];
    $pdesc = $_POST['pdesc'];
    $pkeywords = $_POST['pkeywords'];
   

    $pimage = $_FILES['pimage']["name"];
    $targetdir = "../img/product/".$pimage;
    $image = $targetdir.$pimage;
    $tmp = $_FILES['pimage']["tmp_name"];
    
    if(move_uploaded_file($tmp,$targetdir)){
        //echo "Image moved";
        $check= add_product($pcategory, $pbrand, $ptitle, $pprice, $pdesc, $targetdir, $pkeywords);

        if ($check) {
            echo "Entry Successful";
            header("Location: ../view/Add product.php");
        }

        else{
            echo "not working";
        }
    }else{
        echo "Add Image";
    }

    //  $folder_path = file_upload("images", "product", $tmp, $pimage);





 //check whether function works
 


}

   


    //adding image
    // $pimage = $_FILES['pimage']["name"];
    // $targetdir = "../img/product/".$pimage;
    // $image = $targetdir.$pimage;
    // $tmp = $_FILES['pimage']["tmp_name"];
    
    // if(move_uploaded_file($tmp,$targetdir)){
    //     //echo "Image moved";
    //     $check= add_product($pcategory, $pbrand, $ptitle, $pprice, $pdesc, $targetdir, $pkeywords);

    //     if ($check) {
    //         echo "Product entry Successful";
    //         header("Location: ../view/Add product.php");
    //     }

    //     else{
    //         echo "failed";
    //     }
    // }else{
    //     echo "Image not moved";
    // }






 




?>