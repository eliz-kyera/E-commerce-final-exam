<?php
require_once("../controllers/product_controller.php");


// $product_one =  search_products_ctrl($_GET['search']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Shop</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="../../assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="../../assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="../../assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="../../assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="../../assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="../../assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="../../assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="../../assets/css/responsive.css">

</head>

<body>

	<!--PreLoader-->
	<!-- <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div> -->
	<!--PreLoader Ends-->

	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.php">
								<img src="assets/img/logo.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="current-list-item"><a href="../../index.php">Home</a>

								</li>
								<li><a href="about.php">About</a></li>

								<li><a href="news.php">News</a>

								</li>
								<li><a href="contact.php">Contact</a></li>
								<li><a href="shop.php">Shop</a>
									<ul class="sub-menu">
										<li><a href="shop.html">Shop</a></li>
										<li><a href="checkout.php">Check Out</a></li>
										<!-- <li><a href="single-product.php">Single Product</a></li> -->
										<li><a href="cart.php">Cart</a></li>
									</ul>
								</li>
								<?php
								if (isset($_SESSION['loggedin'])) {
									echo "<li><a href='../actions/logout.php'>Logout</a></li>";
								} else {
									echo '<li><a href="login.php">Login</a></li>';
								}
								?>
								<li>
									<div class="header-icons">
										<a class="shopping-cart" href="cart.php"><i class="fas fa-shopping-cart"></i></a>
										<a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
									</div>
								</li>
							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->

	<!-- search area -->
	<form method="POST" action="../actions/searchprocess.php">
		<div class="search-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<span class="close-btn"><i class="fas fa-window-close"></i></span>
						<div class="search-bar">
							<div class="search-bar-tablecell">
								<h3>Search For:</h3>
								<form method="GET" action="search_product.php">
									<input type="text" name="search" id="search" placeholder="search by title">
									<button type="submit" name="searchbtn">Search <i class="fas fa-search"></i></button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end search arewa -->

		<!-- breadcrumb-section -->
		<div class="breadcrumb-section breadcrumb-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 text-center">
						<div class="breadcrumb-text">
							<p>Explore our different variety of products</p>
							<h1>Shop</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end breadcrumb section -->

		<div class="row">
		<?php
		$search = $_GET['search'];


		$p_search = search_products_ctrl($search);

		foreach ($p_search as $value) {
			$product_id = $value['product_id'];
			$product_title = $value['product_title'];


		?>
			<div class="col-lg-4 col-md-6 text-center ">
				<div class="single-product-item">
					<div class="product-image">
						<a href="single-product.php?id=<?php echo $value['product_id']; ?>"><img src="<?php echo $value['product_image'] ?>" alt=""><i class="tf-ion-ios-eye"></i></a>
					</div>
					<h3><?php echo $value['product_title'] ?></h3>
					<p class="product"><?php echo $value['product_desc'] ?></p>
					<p class="product-price">GH₵ <?php echo $value['product_price'] ?></p>
					<a href="inscription.php?product_id=<?php echo $value['product_id'] ?>&product_name=<?php echo $value['product_title'] ?> " class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>

				</div>
			</div>


		<?php } ?>