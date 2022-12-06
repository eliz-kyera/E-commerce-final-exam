# Nalika
Free dark design Bootstrap admin dashboard template

# Preview

### Screenshot

![Nalika admin dashboard template preview](https://colorlib.com/wp/wp-content/uploads/sites/2/nalika-simple-free-bootstrap-admin-dashboard.jpg)


### Demo Site: [Here](https://colorlib.com/polygon/nalika/index.html)

### Changelog
#### V 1.0.0
Initial Release
### Authors
[Colorlib](https://colorlib.com)

### More info
- [Bootstrap Admin Templates](https://colorlib.com/wp/free-bootstrap-admin-dashboard-templates/)
- [Angular dashboards](https://colorlib.com/wp/angularjs-admin-templates/)
- [Admin Dashboards](https://colorlib.com/wp/free-html5-admin-dashboard-templates/)
- [HTML Templates](https://colorlib.com/wp/templates/)
- [WordPress Themes](https://colorlib.com/wp/free-wordpress-themes/)

### License

Nalika is licensed under The MIT License (MIT). Which means that you can use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the final products. But you always need to state that Colorlib is the original author of this template.


<table>
                                <tr>
                                    
    
                                     <th>Brand List</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                    
                                </tr>

    <?php
        $brandslist = select_all_brands_ctrl();
        foreach ($brandslist as $value) {
        $bid = $value['brand_id'];
    ?>
      
      <div class="css">
        <tr>
          <td>
            <!- Making sure the initial name is displayed in the textbox -->
            <?php echo ($value['brand_name']);
          $bid = $value['brand_id'] ?></td>
          <td><div><a href='./add_brand.php?bid=<?php echo($bid);?>'> <span class="fa fa-pencil" area-hidden="true" ></span></a></div></td>
          <td><div><a href='./delete_brand.php?bid=<?php echo($bid);?>'> <span class="fa fa-trash"></span></a></div></td>
</td>
        </tr>
        <div>
        
          
        </div>
       
    
        
      </div>

<?php
<?php
							if(isset($_SESSION['loggedin'])){
								echo "<a href='cart.php' class='cart-btn'><i class='fas fa-shopping-cart'></i> Add to Cart</a>";
							}else{
									echo "<a href='login.php' class='cart-btn'><i class='fas fa-shopping-cart'></i> Log In to add to cart </a>";
								}
						?> 

        }


        <div class="product-section mt-150 mb-150">
		<div class="container">
			

			<div class="row">

			<?php
          $product = get_products();
          foreach ($product as $value) :
          ?>

            <div class="col-md-4">
              <div class="product-item">
                <div class="product-thumb">
                  <!-- <span class="bage">Sale</span> -->
                  <img class="img-responsive" src="<?php echo $value['product_image'] ?>" alt="product-img" />
                  <div class="preview-meta">
                    <ul>
                      <li>
                        <a href="single_product.php?id=<?php echo $value['product_id']; ?>"><i class="tf-ion-ios-eye"></i></a>
                      </li>
                      <li>
                        <a href="../actions/addcart_process.php?id=<?php echo $value['product_id']; ?>"><i class="tf-ion-android-cart"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="product-content">
                  <h4><?php echo $value['product_title'] ?></h4>
                  <p class="price">GH₵ <?php echo $value['product_price'] ?></p>
                </div>
              </div>
            </div>
    
          <?php endforeach; ?>

        </div>
      </div>


      <div class="col-lg-4 col-md-6 text-center ">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.php"><img src="<?php echo $value['product_image'] ?>" alt=""></a>
						</div>
						<h3><?php echo $value['product_title'] ?></h3>
						<p class="product-price"><?php echo $value['product_desc'] ?></p>
						<p class="product-price">GH₵ <?php echo $value['product_price'] ?></p>
						<a href="../actions/addcart_process.php?id=<?php echo $value['product_id']; ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div> 
?>