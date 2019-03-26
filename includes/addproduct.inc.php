<?php
	session_start();
	include_once 'dbh.inc.php';
	$user_id = $_SESSION['u_id'];
	
	$product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
	$description = mysqli_real_escape_string($conn, $_POST['description']);
	$price = mysqli_real_escape_string($conn, $_POST['price']);
	$unit = mysqli_real_escape_string($conn, $_POST['unit']);
	$sql = "INSERT INTO `product` (`user_id`, `product_id`, `desciption`, `price`, `unit`) VALUES ('$user_id', '$product_id', '$description', '$price', '$unit');";
	mysqli_query($conn, $sql);



	header("Location: ../addproduct.php?save=success");
	?>
			<script>{
				  		alert("Product successfully added!");
				  	}</script>