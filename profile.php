<?php

include('connection.php');

$user_email = "melckzedeck063@gmail.com";
if(isset($_POST['email'])){
    $user_email = $_POST['email'];
}
// die($user_email);
$stmt = $conn->prepare("SELECT id,fname,email,phone FROM customer WHERE email= '$user_email'");
$stmt->execute();
$stmt->bind_result($customer_id,$fname, $email, $phone);
$content = array();
while($stmt->fetch()){
    $temp = array();
    $temp['id'] = $customer_id;
    $temp['fname'] = $fname;
    $temp['email'] = $email;
    $temp['phone'] = $phone;
    array_push($content, $temp);
}
echo json_encode($content);
?>