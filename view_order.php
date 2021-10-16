<?php 
 define('DB_HOST', 'localhost');
 define('DB_USER', 'root');
 define('DB_PASS', '');
 define('DB_NAME', 'furniture-invetory');

	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
	}
    $email = '';
    if(isset($_POST['email'])){
        $email = $_POST['email'];
	}
     $select_customer = "SELECT * FROM customer WHERE email = '$email'";
     $customer_result = mysqli_query($conn, $select_customer);
     if(mysqli_num_rows($customer_result) > 0){
         while($row = mysqli_fetch_assoc($customer_result)){
            $user =  $row['id'];
         }
         
     }
	 else{
		 echo "error occured";
	 }
    
	 ?>

	 <?php
   $customer = $user;
	$stmt = $conn->prepare("SELECT order_id,product_amount,total_cost,customer_id,product_id,order_status,date_created FROM orders WHERE customer_id = '$customer' order by order_id asc;");

	$stmt->execute();
	$stmt->bind_result($order_id,$product_amount,$total_cost,$customer_id,$product_id, $order_status, $date_created);
	$contents = array(); 
	while($stmt->fetch()){
		$temp = array();
		$temp['order_id'] = $order_id;
		$temp['product_amount'] = $product_amount;
		$temp['total_cost'] = $total_cost; 
		$temp['customer_id'] = $customer_id; 
        $temp['product_id'] = $product_id;
        $temp['order_status'] = $order_status;
        $temp['date_created'] = $date_created;
		array_push($contents, $temp);
	}

	echo json_encode($contents);
