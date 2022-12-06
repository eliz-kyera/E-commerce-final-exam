<?php
//connect to database class
include_once dirname((__FILE__)) ."/../settings/db_class.php";

/**
*Product class to handle all product functions 
*/
/**
 *@author 
 *
 */

class Productclass extends db_connection
{
	//--INSERT--//

	function add_brand($brand_name){

		$sql = "INSERT INTO `brands`(`brand_name`) VALUES ('$brand_name')";

		return $this -> query($sql);
	}

	//--SELECT--//
	//Select all
	function get_brand(){
		$sql =" SELECT * FROM `brands`";

		return $this ->fetch($sql);
	}

	

	//Select one
	function select_one_brand($brand_id){
		$sql =" SELECT * FROM `brands` WHERE `brand_id` = '$brand_id'";

		return $this -> fetchOne($sql);
	}

	//--UPDATE--//
	function update_brand($brand_id, $brand_name){
	$sql = "UPDATE brands SET brand_name = '$brand_name' WHERE brand_id = $brand_id";

	return $this -> query($sql);
	}

    	//--DELETE--//
	function delete_brand($brand_id){
		$sql = "DELETE FROM `brands` WHERE brand_id = $brand_id";

		return $this->query($sql);
	}

    
	/* CATEGORIES */

	//--INSERT--//

	function add_category($category_name){

		$sql = "INSERT INTO `categories`(`cat_name`) VALUES ('$category_name')";

		return $this ->query($sql);
	}

	//--SELECT--//
	//Select all
	function get_category(){
		$sql =" SELECT * FROM `categories`";

		return $this ->fetch($sql);
	}

	//Select one
	function select_one_category($cat_id){
		$sql =" SELECT * FROM `categories` WHERE `cat_id` = '$cat_id'";

		return $this ->fetchOne($sql);
	}

	//--UPDATE--//
	function update_category_cls($cat_id, $cat_name){
	$sql = "UPDATE categories SET cat_name = '$cat_name' WHERE cat_id = $cat_id";
	return $this -> query($sql);
	}

	function delete_categories($cat_id)
    {
        $sql= "DELETE FROM `categories` WHERE `cat_id`= $cat_id";
        return $this->query($sql);
    }

	/* PRODUCT */
	//--INSERT--//

	function add_product($pcat, $pbrand, $ptitle, $pprice, $pdescr, $pimage, $pkey){

		$sql = "INSERT INTO `products`(`product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) 
				VALUES ('$pcat', '$pbrand', '$ptitle', '$pprice', '$pdescr', '$pimage', '$pkey')";
	
		return $this -> query($sql);
	}
	
	//--SELECT--//
		//Select all
		function get_product(){
			$sql =" SELECT * FROM `products`";
	
			$prods = $this ->fetch($sql);
			return $prods;
		}

		function delete_products($product_id)
    {
        $sql= "DELETE FROM `products` WHERE `product_id`= $product_id";
        return $this->query($sql);
    }
	
	
	
		//Select one
		function select_one_product($product_id){
			$sql =" SELECT * FROM `products` WHERE `product_id` = '$product_id'";
	
			return $this -> fetchOne($sql);
		}
	
		//--Search all--//
		function search_products($a){
			$sql = "SELECT * FROM `products` WHERE `product_title` LIKE '%$a%'";
			return $this ->fetch($sql);
			//return $sql;
		}
	
	
		//--UPDATE--//
		function update_products($product_id, $product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_keywords){

			$sql= "UPDATE `products` SET `product_cat`='$product_cat', `product_brand`='$product_brand', `product_title`= '$product_title' ,`product_price` = '$product_price', `product_desc`='$product_desc', `product_keywords`='$product_keywords' WHERE `product_id`= '$product_id'";
		
			return $this->query($sql);
		}
		

/* CART */
	//--insert--//

	function insert_cart($p_id, $ip_add, $c_id){

		$sql = "INSERT INTO `cart`(`p_id`, `ip_add`, `c_id`, `qty`) 
				VALUES ('$p_id', '$ip_add', '$c_id', '1')";
	
		return $this ->query($sql);
	}
	
	//select
	function select_cart(){
		$sql =" SELECT products.product_id, products.product_title, products.product_price, products.product_desc, products.product_image, cart.qty 
		FROM cart INNER JOIN products ON cart.p_id = products.product_id;";
	
		return $this -> fetch($sql);
	}
	
	// count cart items class
	function count_cart($cid){
		$sql = "SELECT SUM(qty) FROM cart WHERE c_id = $cid";
	
		return $this ->fetch($sql);
	}
	
	// count cart items class
	function count_one_cart($cid){
		$sql = "SELECT qty FROM cart WHERE c_id = $cid";
	
		return $this ->fetchOne($sql);
	}
	
	/*                        CART MANAGEMENT                       */
	
	function duplicate_cart($pid, $cid){
		$sql = "SELECT p_id, c_id FROM cart WHERE p_id='$pid' AND c_id='$cid' ";
		return $this ->fetch($sql);
		//return $sql;
	}
	
	function duplicate_one_cart($pid, $cid){
		$sql = "SELECT qty FROM cart WHERE p_id='$pid' AND c_id='$cid' ";
		return $this ->fetchOne($sql);
	}
	
	function update_cart_qty($pid, $cid){
		$sql = "UPDATE cart SET qty = qty+1 WHERE p_id = '$pid' AND c_id = '$cid'";
		return $this -> query($sql);
	}
	
	// when quantity is exactly one
	function delete_cart_qty($pid, $cid){
		$sql = "DELETE FROM cart WHERE p_id = '$pid' AND '$cid'"; 
		return $this -> query($sql);
	}
	
	//when quantity is more than 1
	function update_more_cart_qty($pid, $cid){
		$sql = "UPDATE cart SET qty = qty-1 WHERE p_id = '$pid' AND c_id = '$cid'";
		return $this -> query($sql);
	}
	
	function update_textbox($pid, $cid, $txtbox){
		$sql = "UPDATE cart SET qty = '$txtbox' WHERE p_id = '$pid' AND c_id = '$cid'";
		return $this -> query($sql);
	}
	
	
	
}
?>