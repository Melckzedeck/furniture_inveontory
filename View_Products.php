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
	$stmt = $conn->prepare("SELECT product_name,product_description,product_price,product_image FROM products order by product_id asc;");
	
	$stmt->execute();
	$stmt->bind_result($product_name,$product_description,$product_price,$product_image);
	$contents = array(); 
	while($stmt->fetch()){
		$temp = array();
		$temp['product_name'] = $product_name;
		$temp['product_description'] = $product_description;
		$temp['product_price'] = $product_price; 
		$temp['product_image'] = $product_image; 
		array_push($contents, $temp);
	}
	echo json_encode($contents);
