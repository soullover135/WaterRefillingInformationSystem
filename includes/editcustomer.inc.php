<?php
require('dbh.inc.php');
$customer_no = $_POST['customer_no'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$contact_no = $_POST['contact_no'];
$address = $_POST['address'];

$query = "UPDATE `customer` SET `first_name` = '$first_name', `last_name` = '$last_name', `contact_no` = '$contact_no', `address` = '$address' WHERE `customer`.`customer_no`  =  " . $customer_no; 

$result = mysqli_query($conn,$query) ;

header("Location: ../viewcustomer.php?delete=success");