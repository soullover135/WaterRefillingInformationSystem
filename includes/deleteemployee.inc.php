<?php
require('dbh.inc.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM employee WHERE emp_no=$id;"; 
$result = mysqli_query($conn,$query) ;

header("Location: ../viewemployee.php?delete=success");

