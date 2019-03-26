<?php
	session_start();
	include_once 'dbh.inc.php';
	$user_id = $_SESSION['u_id'];
	
	$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
	$last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
	$position = mysqli_real_escape_string($conn, $_POST['position']);
	$sql = "INSERT INTO `employee` (`user_id`, `first_name`, `last_name`, `position`) VALUES ('$user_id', '$first_name', '$last_name', '$position');";
	mysqli_query($conn, $sql);
		
	header("Location: ../addemployee.php?save=success");