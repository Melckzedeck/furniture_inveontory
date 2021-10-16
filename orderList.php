<?php
 
 require_once('connection.php');
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture Purchasing </title>
    <link rel="stylesheet" href="./Css/all.min.css">
    <script src="./Css/all.min.js"></script>

    <style>
        
* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}
body {
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  /* padding-left: 0.6em; */
  /* text-align: center; */
}
.form-content {
  width: 60%;
  margin: auto;
  border: 1px solid grey;
  padding: 1em 2em;
  border-radius: 10px;
  /* position: absolute;
  left: 60%;
  top : 50%;
  transform : translate(-50%, -50%); */
  background: white;
  /* background-image: url(../../images/church5.jpg); */
  background-size: cover;
  background-repeat: no-repeat;
  margin-bottom: 1em;
}
.branch{
    font-size: 1.2em;
    font-weight:600;
}
.top {
  padding: 0.5em;
  box-shadow: 2px 8px 16px grey;
}
#info{
    width: 30%;
  /* margin: auto; */
  padding: 1em 2em;
}
.home{
    border: 1px solid grey;
    padding: 0.5em;
}
input,textarea {
  width: 90%;
  padding: 0.5em;
  margin: 0.4em;
  border-radius: 5px;
  border: 1px solid grey;
  outline: none;
}
.alert {
  padding: 0.5em;
  margin: auto;
  border-radius: 5px;
  width: 50%;
  margin-bottom: 0.4em;
}
.success {
  background-color: green;
  color: white;
}
.err {
  background-color: red;
  color: white;
}
.btn {
  padding: 0.5em 1.5em;
  background-color: navy;
  color: white;
  border: none;
  outline: none;
  margin: 1em 0.5em;
  border-radius: 5px;
}
#inner-btn {
  padding: 0.5em 1.5em;
  background-color: navy;
  color: white;
  border: none;
  outline: none;
  margin: 0 0.2em;
  border-radius: 5px;
}
.hidden {
  display: none;
}
.form-container > p,
.table-container > p {
  background-color:teal;
  color:white;
  margin-bottom: 0.8em;
  /* padding: 0.5; */
  padding: 0.5em;
  box-shadow: 2px 8px 16px grey;
  text-align: center;
  font-size: 1.2em;
}
.table-container {
  text-align: center;
  overflow-x: auto;
}
tr:nth-child(even) {
  background-color: #dddddd;
}
table {
  width: 95%;
  margin: auto;
  margin-bottom:1em;
}
table,
td,
th {
  border: 1px solid gray;
  border-collapse: collapse;
  padding: 0.5em 0.1em;
}
th{
    background: teal;
    color: white;
}
.bottom-footer{
  background-color:teal;
  /* margin-bottom: 0.8em; */
  width: 100%;
  /* padding: 0.5; */
  padding: 0.5em;
  color: white;
  box-shadow: 2px 8px 16px grey;
  text-align: center;
  font-size: 1.2em;
}
.Err{
  color: red;
}
.success{
  background: green;
  color: white;
  padding: 0.3em;
  text-align: center;
  border-radius: 5px;
  width: 40%;
  margin: auto;
}
.error{
  background: red;
  color: white;
  padding: 0.3em;
  text-align: center;
  border-radius: 5px;
  width: 40%;
  margin: auto ;
}
    </style>
</head>
<body>


   


    
            
      


    <div class="table-container">
        <p><b>Orders Information</b></p>
        <table>
            <tr>
                 <th>Order Id</th>
                 <th>Product Amount</th>
                 <th>Total cost</th>
                 <th>Order Status</th>
                 <th>Date</th>
                 <th>Product Id</th>
                 <th>Customer Name</th>
                <th></th>
                <!-- <th>Action</th> -->
            </tr>
          <tbody id="list">
            <tr>
                
            
                  <!-- ============= FETCHING DATA FROM THE DATABASE ===========  -->
                
                    <?php

                      $fetch_query = "SELECT * FROM orders";  
                      $data = mysqli_query($conn, $fetch_query);
                      if(mysqli_num_rows($data) > 0){
                        while($row = mysqli_fetch_assoc($data)){
                            $price = $row['total_cost'];
                            $product_amount = $row['product_amount'];
                            $total_cost = ($price * $product_amount);
                             ?>
                                <tr>
                                  <td> <?php echo $row['order_id']; ?></td>
                                  
                                  
                                  <td> <?php echo $row['product_amount'];?></td>
                                  <td> <?php echo $total_cost;?></td>
                                  <td> <?php echo $row['order_status'];?></td>
                                  <td> <?php echo $row['order_date'];?></td>
                                  <td> 
                                    <?php 
                                    echo $product_id =  $row['product_id'];
                                  //   $select_products = "SELECT * FROM products WHERE product_id = '$product_id'";
                                  //   $products_output = mysqli_query($conn, $select_products);
                                  //   if(mysqli_num_rows($products_output) > 0){
                                  //    while($row = mysqli_fetch_assoc($products_output)){
                                  //           $products_name = $row['product_name'];
                                  //           echo $products_name;
                                  //    }
                                  //  }
                                    ?>
                                </td>
                                  <td> 
                                    <?php 
                                           $customer_id =  $row['customer_id'];
                                           $select_customer = "SELECT * FROM customer WHERE id = '$customer_id'";
                                            $customer_output = mysqli_query($conn, $select_customer);
                                            if(mysqli_num_rows($customer_output) > 0){
                                             while($row = mysqli_fetch_assoc($customer_output)){
                                                    $customer_name = $row['fname'];
                                                    echo $customer_name;
                                             }
                                           }
                                  ?>
                                </td>
                                  <td>
                                    <form action="" method="post">
                                      <input type="hidden" name="branches_edit" value="">
                                  <button id='inner-btn' name='edit'> Edit</button>
                                  </form>
                                  </td>
                                  <td>
                                    <form action="" method="post">
                                      <input type="hidden" name="delete_id" value="">
                                 <button id='inner-btn' name='delete' onClick='javascript:return confirm("are you sure you want to delete");'> Delete</button> </form>
                                 </td>
                                </tr>
                             <?php
                           
                        }
                      }
                      
                   ?>

          </tbody>
        </table>
    </div>
    
</div>

<script>
 const open = document.getElementById('add-data-btn');
const close = document.getElementById('close-btn');
let save = document.getElementById('save-btn');
let form = document.querySelector('.form-content');

open.addEventListener('click', () => {
    form.classList.remove('hidden');
})

close.addEventListener('click', () => {
    console.log('close button clicked');
})
</script>
</body>
</html>
<?php
//  ob_flush();
// include('../../config/footer.php');
?>
