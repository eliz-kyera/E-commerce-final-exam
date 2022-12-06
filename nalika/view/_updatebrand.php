<?php 
include("../controllers/product_controller.php");
$bid = $_GET['bid'];
$brand_detail = select_brand_ctrl($bid);

//initiating a server to get the post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_POST['submit'])){
       
       
    $Bname_update = $_POST['update_brand'];
    $check_update = update_all_brands_ctrl($bid, $Bname_update);
    if ($check_update) {
        header("location: ../view/brand.php");
    }
    else{
        return false;
    }
}
}
?>


       
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Update Category - DAS</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="../css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="../jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link rel="stylesheet" href="../css/admin_bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="../css/admin_templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
  </head>
  <body>
  <form method="POST" action="" class="tm-edit-product-form">
                  <input type="hidden" name="cat_id" value="<?php echo($bid)?>">
                    <div class="form-group mb-3">
                      <label for="update_cat">Cat Name</label>
                      <input id="name" name="update_brand" type="text" class="form-control validate" required value="<?php echo($brand_detail['brand_name'])?>">
                    </div>
                      </div>
                      <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                      </div>
                      <div class="col-6">
                        <button type="submit" name ="submit" class="btn btn-primary btn-block text-uppercase">Update Brand</button>
                      </div>
                 </form>
  </body>
