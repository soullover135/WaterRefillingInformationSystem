<?php
require('dbh.inc.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM product WHERE product_id=$id;"; 
$result = mysqli_query($conn,$query) ;

header("Location: ../viewproduct.php?delete=success");

