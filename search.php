<?php
include('connection.php');

$user_input = 'bed';
if(isset($_POST['user_input'])){
    $user_input = $_POST['user_input'];
}

$stmt = $conn->prepare("SELECT * FROM products WHERE product_name LIKE '%$user_input%' OR product_description LIKE '%$user_input%'");
$stmt->execute();
$stmt->bind_result($product_id, $product_name,$product_description,$product_price, $product_image,$date_created);
$content = array();
while($stmt->fetch()){
    $temp = array();
    $temp['product_id'] = $product_id;
    $temp['product_name']  = $product_name;
    $temp['product_description'] = $product_description;
    $temp['product_price'] = $product_price;
    $temp['product_image'] = $product_image;
    $temp['date_created'] = $date_created;
    array_push($content, $temp);
}
echo json_encode($content);
?>