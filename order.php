<?php
 
 require_once('connection.php');
  ?>

  <?php
    // if($conn){
 $prod_name = "";
if(isset($_POST["product"])){
    $prod_name = $_POST["product"];
}
$email = "";
if(isset($_POST["email"])){
    $email = $_POST["email"];
}

$prod_amount = "";
if(isset($_POST["amount"])){
    $prod_amount = $_POST["amount"];
}
// $price = "2000";
// if(isset($_POST["price"])){
//     $price = $_POST["price"];
// }

if(!empty($prod_name) && !empty($email) && !empty($prod_amount)){
  // ============== GETING CUSTOMER ID ============ 
  $select_customer = "SELECT *  FROM customer WHERE email = '$email' OR phone = '$email'";
  $customer_result = mysqli_query($conn, $select_customer);
  if(mysqli_num_rows($customer_result) > 0){
    while($row = mysqli_fetch_assoc($customer_result)){
      $customer = $row['id'];
    }
  }
//  ================ GETING PRODUCT ID   ======================
$select_product = "SELECT * FROM products WHERE product_name = '$prod_name'";
$product_result = mysqli_query($conn, $select_product);
if(mysqli_num_rows($product_result) > 0){
  while($row = mysqli_fetch_assoc($product_result)){
    $product = $row['product_id'];
    $price = $row['product_price'];
  }
}


      // ==== NSERTING DATA TO THE DATABASE ========= 
 $insert_query = "INSERT INTO orders (product_amount, total_cost, customer_id, product_id, order_status) values ('$prod_amount', '$price', '$customer', '$product', 'pending')";

 
 if(mysqli_query($conn,$insert_query)){
      $result['success']='1';
  $result['message']='successful';
      echo json_encode($result);
    mysqli_close($conn);
 }
 else {
      $result['success']='0';
      $result['message']='error';
          echo json_encode($result);
          mysqli_close($conn);
 }
}
?>
