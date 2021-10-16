<?php
 
 require_once('connection.php');
  
    // if($conn){
 $fname = "";
if(isset($_POST["fname"])){
    $fname = $_POST["fname"];
}
$email = "";
if(isset($_POST["email"])){
  $email = $_POST["email"];
}
$phone = "";
if(isset($_POST["phone"])){
    $phone = $_POST["phone"];
}

$password = "";
if(isset($_POST["password"])){
    $password = $_POST["password"];
}
$cpassword = "";
if(isset($_POST["cpassword"])){
    $cpassword = $_POST["cpassword"];
}

if(!empty($fname) && !empty($email) && !empty($phone) && !empty($password) && !empty($cpassword)){
 $insert_query = "INSERT INTO customer(fname,email, phone, password, cpassword) values ('$fname', '$email','$phone', '$password', '$cpassword')";

 
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

