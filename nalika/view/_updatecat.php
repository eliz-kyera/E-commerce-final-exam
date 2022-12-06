<?php 
include("../controllers/product_controller.php");
$cid = $_GET['cid'];
$category_detail = select_category_ctrl($cid);

//initiating a server to get the post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_POST['submit'])){
       
       
    $Cname_update = $_POST['update_cat'];
    $check_update = update_all_category_ctrl($cid, $Cname_update);
    if ($check_update) {
        header("location: ../view/category.php");
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
                  <input type="hidden" name="cat_id" value="<?php echo($cid)?>">
                    <div class="form-group mb-3">
                      <label for="update_cat">Cat Name</label>
                      <input id="name" name="update_cat" type="text" class="form-control validate" required value="<?php echo($category_detail['cat_name'])?>">
                    </div>
                      </div>
                      <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                      </div>
                      <div class="col-6">
                        <button type="submit" name ="submit" class="btn btn-primary btn-block text-uppercase">Update Categories Now</button>
                      </div>
                 </form>
  </body>
