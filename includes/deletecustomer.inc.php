<?php
require('dbh.inc.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM customer WHERE customer_no=$id;"; 
$result = mysqli_query($conn,$query) ;

header("Location: ../viewcustomer.php?delete=success");

