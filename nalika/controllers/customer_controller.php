<?php
//connect to the user account class
include_once dirname((__FILE__)) ."/../classes/customer_class.php";
include("../functions/functions.php");





//--INSERT--//
function add_customer_ctrl($name, $email, $pass, $country, $city, $contact){

// creating an instance
  $add = new customerclass;

// return method
  $run_query =  $add -> add_customer($name, $email, $pass, $country, $city, $contact);

  if ($run_query) {
    return $run_query; 
  } else {
    return false; 
  }
}

// function returnCustomer_ctr($email){
//   $add_customer= new CustomerClass();
//   return $add_customer->returnCustomer_cls($email);
// }

// function returnCustomerid_ctr($id){
//   $add_customer= new CustomerClass();
//   return $add_customer->returnCustomerid_cls($id);
// }

  
  
  function returncustomer($cus_email){
    $login = new customerclass();
    $data = $login -> check_login_customer($cus_email);
    return $data;
    
  }
  
  
  //--SELECT--//
  //LOGIN
  function return_customer_ctrl($cus_email, $cus_pass){
  
    // creating instance
    $login = new customerclass();
  
    $records = array();
    // return method
    $data = $login -> check_login_customer($cus_email);
  
    if ($data) {
      if (verify_pass($data['customer_pass'], $cus_pass) == true) {
        return true;
      }else {
        return false;
      }
    } else {
      return false; 
    }
    
    
  }
  
  function user_email_ctrl($cid){
  
    // creating instance
    $user_email = new customerclass();
  
    // return method
    $data = $user_email -> user_email($cid);
      return $data;
  }
  
  //selecting all product
  function get_user_ctrl(){
  
    // creating instance
    $select_product = new customerclass();
  
    // return method
    return $select_product -> get_user();
    
  }
  
  function duplicate_email($email){
  
    // creating instance
    $user_email = new customerclass();
  
    // return method
    $data = $user_email -> get_email($email);
    return $data;
  }
  
  
?>
