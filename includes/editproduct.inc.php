<?php
require('dbh.inc.php');
$product_id = $_POST['product_id'];
$description = $_POST['description'];
$price = $_POST['price'];
$unit = $_POST['unit'];

$query = "UPDATE `product` SET `desciption` = '$description', `price` = '$price', `$unit` = '1' WHERE `product`.`product_id` = '$product_id'"; 

$result = mysqli_query($conn,$query) ;

header("Location: ../viewproduct.php?delete=success");

