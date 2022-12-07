<?php
require("../controllers/cart_controller.php");
session_start();


if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION['role'] != 2) {
	header("location: login.php");
	exit;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Cart</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
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


	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<link rel="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

</head>

<body>
	<?php






	$cid = $_SESSION['customer_id'];

	$count_cart = count_cart_ctrl($cid);
	$every_item = every_cart_item_ctr($cid);
	// print_r($every_item);
	$total_price = total_price_ctrl($cid);
	$amt = 0;
	foreach ($total_price as $total) {
		$amt = $total['total'];
	}




	?>


	<!--PreLoader-->
	<div class="loader">
		<div class="loader-inner">
			<div class="circle"></div>
		</div>
	</div>
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
								<!-- <img src="assets/img/logo.png" alt=""> -->
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="current-list-item"><a href="../../index.php">Home</a>
									<!-- <ul class="sub-menu">
										<li><a href="index.html">Static Home</a></li>
										<li><a href="index_2.html">Slider Home</a></li>
									</ul> -->
								</li>
								<li><a href="about.php">About</a></li>
								<!-- <li><a href="#">Pages</a>
									<ul class="sub-menu">
										<li><a href="404.html">404 page</a></li>
										<li><a href="about.html">About</a></li>
										<li><a href="cart.html">Cart</a></li>
										<li><a href="checkout.html">Check Out</a></li>
										<li><a href="contact.html">Contact</a></li>
										<li><a href="news.html">News</a></li>
										<li><a href="shop.html">Shop</a></li>
									</ul> -->
								<!-- </li> -->
								<li><a href="news.php">News</a>
									<ul class="sub-menu">
										<li><a href="news.php">News</a></li>
										<!-- <li><a href="single-news.html">Single News</a></li> -->
									</ul>
								</li>
								<li><a href="contact.php">Contact</a></li>
								<li><a href="shop.php">Shop</a>
									<ul class="sub-menu">
										<li><a href="shop.php">Shop</a></li>
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
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<input type="text" placeholder="Keywords">
							<button type="submit">Search <i class="fas fa-search"></i></button>
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
						<p>Fresh and Organic</p>
						<h1>Cart</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->
	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove"></th>
									<th class="product-image">Product Image</th>
									<th class="product-name">Name</th>
									<th class="product-price">Price</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-quantity">Inscription</th>
									<!-- <th class="product-quantity">Add inscription</th> -->
									<th class="product-total">Sub-total</th>
								</tr>
							</thead>
							<?php
							// $every_item = select_cart_ctrl($_SESSION['customer_id']);
							//print_r($cart_option);

							//if ($product_option) {
							foreach ($every_item as $cart) {
								// print_r($cart_one);
								$product_name = $cart['product_title'];
								// echo "$product_name";
								$product_price = $cart['product_price'];
								$product_desc = $cart['product_desc'];
								$product_image = $cart['product_image'];
								$cid = $cart['product_id'];
								$qty = $cart['qty'];
								$insc = $cart['inscription'];


								//echo "<option value = $product_id>$product_name</option>";
								// if ($_SERVER['REQUEST_METHOD'] == "POST") {
								// 	$pid = $_POST['product_id'];
								// }
							?>
								<tr class="table-body-row">

									<!-- <td class="product-remove"><a href="../actions/deletefrom_cart.php?id=<?php echo ($cid); ?><i class="far fa-window-close"></i></a></td> -->
									<td>
										<div><a href='../actions/deletefrom_cart.php?id=<?php echo ($cid); ?>'><span class="fa fa-trash"></span></a></div>
									</td>
									<td class="product-image"><img src="<?php echo $product_image ?>" alt=""></td>
									<td class="product-name"><?php echo $product_name ?></td>
									<td class="product-price">¢<?php echo $product_price ?></td>
									<td class="product-quantity align-items-center justify-content-center">
										<div class=" align-items-center ">
											<a class='btn btn-danger' href='../actions/addcart_process.php?decID=<?php echo $cid; ?>' role='button'>-</a>
											<span class="mx-2"><?php echo $qty; ?></span>
											<a class='btn btn-success' href='../actions/addcart_process.php?incID=<?php echo $cid; ?>' role='button'>+</a>
										</div>
										<!-- </td><a href='../actions/deletefrom_cart.php?id=< ?>'><span class="fa fa-pencil-square-o"></span></a> -->
										<!-- <td> <span class="fa fa-pencil-square-o">hello</span></td>  -->
									<td class="product-name"><?php echo $insc ?>&nbsp;&nbsp;&nbsp;<a href="update_inscription.php?product_id=<?php echo $cart['product_id']?>&insc=<?php echo $insc?>&product_name=<?php echo $product_name ?>">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
												<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
												<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
											</svg>

										</a></td>
									<td class="product-total"><?php echo $qty * $product_price ?></td>
								</tr>
							<?php
							}
							//else {echo "<option value = 'not available'>product not found</option>";
							?>

							</tbody>
						</table>
					</div>
				</div>
			</div>
			<br>

			<div class="col-lg-4">
				<div class="total-section">
					<table class="total-table">
						<thead class="total-table-head">
							<tr class="table-total-row">
								<th>Total</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>
							<tr class="total-data">
								<td><strong>Total: </strong></td>

								<?php
								echo "<td> GHC $amt</td>";

								?>

							</tr>
						</tbody>
					</table>
					<div class="cart-buttons">
						<!-- <a href="cart.html" class="boxed-btn">Update Cart</a> -->
						<a href="checkout.php" class="boxed-btn black">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
	<!-- end cart -->

	<!-- logo carousel -->
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="../../assets/img/company-logos/1.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="../../assets/img/company-logos/2.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="../../assets/img/company-logos/3.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="../../assets/img/company-logos/4.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="../../assets/img/company-logos/5.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo carousel -->

	<!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">About us</h2>
						<p>Ut enim ad minim veniam perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">Get in Touch</h2>
						<ul>
							<li>34/8, East Hukupara, Gifirtok, Sadan.</li>
							<li>support@fruitkha.com</li>
							<li>+00 111 222 3333</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box pages">
						<h2 class="widget-title">Pages</h2>
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="about.html">About</a></li>
							<li><a href="services.html">Shop</a></li>
							<li><a href="news.html">News</a></li>
							<li><a href="contact.html">Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box subscribe">
						<h2 class="widget-title">Subscribe</h2>
						<p>Subscribe to our mailing list to get the latest updates.</p>
						<form action="index.html">
							<input type="email" placeholder="Email">
							<button type="submit"><i class="fas fa-paper-plane"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end footer -->

	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; 2019 - <a href="https://imransdesign.com/">Imran Hossain</a>, All Rights Reserved.</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->

	<!-- jquery -->
	<script src="../../assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="../../assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="../../assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="../../assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="../../assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="../../assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="../../assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="../../assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="../../assets/js/main.js"></script>

</body>

</html>