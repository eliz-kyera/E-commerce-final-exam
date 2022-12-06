<?php
//connect to the user account class
include_once dirname((__FILE__)) . "/../classes/product_class.php";

//sanitize data
function cleanText($data) 
{
  $data = trim($data);
  return $data;
}


// BRAND
//--INSERT--//


function add_brand_ctrl($brand_name){

  //creating an instance
  $add_brand = new Productclass();

  // return method
  return $add_brand -> add_brand($brand_name);
}

//--SELECT--//
//selecting one brand
function select_brand_ctrl($brand_id){

  // creating instance
  $select_brand = new Productclass();

  // return method
  $data = $select_brand -> select_one_brand($brand_id);
    return $data;
}

//selecting all brands

function get_brands(){

//   // creating instance
  $select_brand = new Productclass();

  // return method
  $data = $select_brand -> get_brand();
    return $data;
 }

//--UPDATE--//
//update all brands
function update_all_brands_ctrl($brand_id, $brand_name){

  //creating instance
  $update_brand = new Productclass();

  // return method
  $data = $update_brand -> update_brand($brand_id, $brand_name);
    return $data;
}

//Delete brand 
function delete_brand($brand_id) {
  $brand = new Productclass; 

  $run_query = $brand->delete_brand($brand_id);

  if($run_query) {
      return $run_query;
  } else {
      return false;
  }
}


/* CATEGORIES */
//insert
function add_category_ctrl($category_name){

    //creating an instance
    $add_category = new Productclass();
  
    // return method
    return $add_category -> add_category($category_name);
  }
  
  //--SELECT--//
  //selecting one brand
  function select_category_ctrl($cat_id){
  
    // creating instance
    $select_category = new Productclass;
  
    // return method
    $data = $select_category -> select_one_category($cat_id);
    
    if ($data) {
      return $data; 
    } else {
      return array(); 
    }
  }
  
  //selecting all brands
  function get_categories(){
  
    // creating instance
    $select_category = new Productclass;
  
    // return method
    $data = $select_category -> get_category();
      return $data;
  }
  //--UPDATE--//
  
  //update all brands
  function update_all_category_ctrl($cat_id, $cat_name){
  
    //creating instance
    $update_category = new Productclass();
  
    // return method
    return $update_category->update_category_cls($cat_id, $cat_name);
  }

  function delete_category_name($cat_id) {
    $categories = new Productclass; 

    $run_query = $categories->delete_categories($cat_id);

    if($run_query) {
        return $run_query;
    } else {
        return false;
    }
}

/* PRODUCT */

//--INSERT--//

function add_product($pcat, $pbrand, $ptitle, $pprice, $pdescr, $pimage, $pkey){

  //creating an instance
  $add_product = new Productclass();

  // return method
  return $add_product -> add_product($pcat, $pbrand, $ptitle, $pprice, $pdescr, $pimage, $pkey);
}

//SELECT
//selecting all product
function get_products(){

  // creating instance
  $select_product = new Productclass();

  // return method
  return $select_product -> get_product();
  
}

function delete_products($product_id) {
  $product= new Productclass; 

  $run_query = $product->delete_products($product_id);

  if($run_query) {
      return $run_query;
  } else {
      return false;
  }
}

//selecting all products
// function select_all_products_ctrl(){

//   // creating instance
//   $select_product = new Productclass();

//   // return method
//   $data = $select_product -> get_product();
//     return $data;
// }

function search_products_ctrl($a){

  $search_product = new Productclass();

  return $search_product -> search_products($a);

}

//selecting one product
function select_one_product($product_id){

  // creating instance
  $select_product = new Productclass();

  // return method
  $data = $select_product -> select_one_product($product_id);
    return $data;
}

//--UPDATE--//
//update all product
function update_products($product_id, $product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_keywords){
  $products= new Productclass;
  
  $run_query = $products->update_products($product_id, $product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_keywords); 

  if ($run_query) {
      return $run_query;
  } else {
      return false; 
  }

 
}


?>
