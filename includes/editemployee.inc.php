<?php
require('dbh.inc.php');
$emp_no = $_POST['emp_no'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$position = $_POST['position'];

$query = "UPDATE `employee` SET `first_name` = '$first_name', `last_name` = '$last_name', `position` = '$position' WHERE `employee`.`emp_no`  =  " . $emp_no; 

$result = mysqli_query($conn,$query) ;

header("Location: ../viewemployee.php?delete=success");