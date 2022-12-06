<?php
//connect to database class
include_once dirname((__FILE__)) ."/../settings/db_class.php";

/**
*Customer class to handle all customer functions 
*/
/**
 *@author 
 *
 */

class customerclass extends db_connection
{
	//--INSERT--//

	function add_customer($name, $email, $pass, $country, $city, $contact)
	{
		$sql = "INSERT INTO `customer`(`customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `user_role`) VALUES ('$name','$email','$pass','$country','$city', '$contact', '2')";

		return $this->query($sql);
	}


	// function returnCustomer_cls($email){
	// 	$sqltwo= "SELECT * FROM `customer` WHERE `customer_email` = '$email'";
	// 	return $this->fetchOne($sqltwo);

	// }
	// function returnCustomerid_cls($id){
	// 	$sqltwo= "SELECT * FROM `customer` WHERE `customer_id` = '$id'";
	// 	return $this->fetchOne($sqltwo);

	// }

	//--SELECT--//
	function check_login_customer($email){

		$sql = "SELECT * FROM `customer` WHERE `customer_email` = '$email'";

		return $this -> fetchOne($sql);
	}

	function user_email($c_id){
		$sql = "SELECT customer_email FROM customer WHERE customer_id = '$c_id'";

		return $this -> fetchOne($sql);
	}

	function get_user(){
		$sql ="SELECT * FROM `customer`";

		$prods = $this -> fetch($sql);
		return $prods;
	}

	function get_email($email) {
		$sql = "SELECT customer_email FROM customer WHERE customer_email = '$email'";
		return $this -> fetch($sql); 
	}


	//--UPDATE--//



	//--DELETE--//
	

}

?>