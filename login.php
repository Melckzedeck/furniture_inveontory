<?php
session_start();
require_once('connection.php');
$phone = "";
if(isset($_POST["phone"])){
	$phone = $_POST["phone"];
}
$password = "";
if(isset($_POST["password"])){
$password = $_POST["password"];
}
$login_query = "SELECT phone, password FROM customer WHERE (phone = '$phone' OR email ='$phone')AND password ='$password' ";

$result = mysqli_query($conn, $login_query);

if(!$result){
	echo ("Could not get data". mysqli_error($conn));
}
if($row = mysqli_fetch_array($result)) {
  $results['success']='1';
  $results['message']='successful';
      echo json_encode($results);
    }else {
      $results['success']='0';
      $results['message']='error';
          echo json_encode($results);
    }
?>