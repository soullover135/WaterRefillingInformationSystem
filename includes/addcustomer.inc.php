<?php
	session_start();
	include_once 'dbh.inc.php';
	$user_id = $_SESSION['u_id'];
	
	$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
	$last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
	$contact_no = mysqli_real_escape_string($conn, $_POST['contact_no']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	
	
	$sql = "INSERT INTO `customer` (`user_id`, `first_name`, `last_name`, `contact_no`, `address`) VALUES ('$user_id', '$first_name', '$last_name', '$contact_no', '$address');";
	mysqli_query($conn, $sql);
	
	
		
	header("Location: ../addcustomer.php?save=success");