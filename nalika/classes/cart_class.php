<?php
//connect to the user account class
include_once dirname((__FILE__)) ."/../settings/db_class.php";



class cart_class extends db_connection
{

	//--insert--//

	function add_cart($p_id, $ip_add, $c_id){

		$sql = "INSERT INTO `cart`(`p_id`, `ip_add`, `c_id`, `qty`) VALUES ('$p_id', '$ip_add', '$c_id', '1')";
	
		return $this -> query($sql);
	}
	
	//select
	function select_cart($c_id){
		$sql =" SELECT products.product_id, products.product_title, products.product_price, products.product_desc, products.product_image, cart.qty, cart.inscription FROM cart INNER JOIN products ON cart.p_id = products.product_id WHERE `c_id`=$c_id;";
	
		return $this -> fetch($sql);
	}
	
	function select_one_cart($c_id, $p_id){
		$sql = "SELECT * FROM cart WHERE c_id = '$c_id' AND p_id = '$p_id'";
		return $this->fetchOne($sql);
	}

	// count cart items class
	function count_cart($cid){
		$sql = "SELECT SUM(qty) FROM cart WHERE c_id = $cid";
	
		return $this -> fetch($sql);
	}
	
	// count cart items class
	function count_one_cart($cid){
		$sql = "SELECT qty FROM cart WHERE c_id = $cid";
	
		return $this -> fetch($sql);
	}
function cart_count($customer_id){
	return $this-> fetchOne("SELECT COUNT(p_id) as counting FROM cart where c_id ='$customer_id'");
}



function duplicate_cart($pid, $cid){
	$sql = "SELECT p_id, c_id FROM cart WHERE p_id='$pid' AND c_id='$cid' ";
	return $this ->fetch($sql);
	//return $sql;
}

function duplicate_one_cart($pid, $cid){
	$sql = "SELECT qty FROM cart WHERE p_id='$pid' AND c_id='$cid' ";
	return $this ->fetch($sql);
}

function update_cart_qty($pid, $cid, $qty){
	$sql = "UPDATE cart SET qty = '$qty' WHERE p_id = '$pid' AND c_id = '$cid'";
	return $this -> query($sql);
}

function reduce_cart_qty($pid, $cid){
	$sql = "UPDATE cart SET qty = qty-1 WHERE p_id = '$pid' AND c_id = '$cid'";
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

function every_cart_item($cid){
	$sql = "SELECT products.product_price * cart.qty, cart.qty, products.product_id, products.product_title, products.product_desc, products.product_image, products.product_price 
	FROM cart INNER JOIN products ON cart.p_id = products.product_id WHERE cart.c_id = '$cid'";
	return $this -> fetch($sql);
}

function total_price($cid){
	$sql = "SELECT SUM(cart.qty * products.product_price) as total FROM cart 
	INNER JOIN products ON cart.p_id = products.product_id WHERE cart.c_id = '$cid'";
	return $this -> fetch($sql);
}

function insert_detail($email, $amt){
	$sql = "INSERT INTO `paymentprocess`(`email`, `amount`) VALUES ('$email', '$amt')";

	return $this -> query($sql);
}

function insert_order($cid, $invoice, $date){
	$sql = "INSERT INTO `orders`(`customer_id`, `invoice_no`, `order_date`, `order_status`)
			 VALUES ('$cid','$invoice','$date', 'Success')";
			 
	$this -> query($sql);

	return mysqli_insert_id($this->db);
}

function insert_payment($amt, $cid, $oid, $date){
	$sql = "INSERT INTO `payment`(`amt`, `customer_id`, `order_id`, `currency`, `payment_date`) 
	VALUES ('$amt', '$cid', '$oid', 'GHS', '$date')";

	return $this -> query($sql);
}

function order_id(){
	$sql = "SELECT order_id FROM orders ORDER BY order_id DESC LIMIT 1";
	
	return $this -> fetch($sql);
}

function order_date(){
	$sql = "SELECT order_date FROM orders ORDER BY order_id DESC LIMIT 1";
	
	return $this -> fetch($sql);
}

function get_from_cart($cid){
	$sql = "SELECT `p_id`, `qty` FROM `cart` WHERE c_id = '$cid'";

	return $this -> fetch($sql);
}

function insert_order_details($oid, $pid, $qty, $inscription){
	$sql = "INSERT INTO `orderdetails`(`order_id`, `product_id`, `qty`, `inscription`) VALUES ('$oid','$pid','$qty', '$inscription')";

	return $this -> query($sql);
}

function delete_from_cart($cid,$pid){
	$sql = "DELETE FROM cart WHERE c_id = '$cid' and  p_id ='$pid'";

	return $this -> query($sql);
}

}

?>








