<?php
	session_start();
	include_once 'dbh.inc.php';
	$user_id = $_SESSION['u_id'];
	
	$sales_id = mysqli_real_escape_string($conn, $_GET['sales_id']);
	$quantity = mysqli_real_escape_string($conn, $_GET['quantity']);
	$product_id = mysqli_real_escape_string($conn, $_GET['product_id']);
	
	
	

							$sql = "SELECT *
									FROM product AS p 
									JOIN users AS r 
									WHERE p.user_id = $user_id  
									AND r.user_id = $user_id and product_id=$product_id;";
							$result = mysqli_query($conn, $sql);
							$resultCheck = mysqli_num_rows($result);
							
							if ($resultCheck > 0) {
								while ($row = mysqli_fetch_assoc($result)) {
								$product_id = $row["product_id"];
								$price = $row["price"];
										
										
										
									$sql = "SELECT * 
											FROM sales WHERE sales_id=$sales_id;";
									$result = mysqli_query($conn, $sql);
									$resultCheck = mysqli_num_rows($result);
									
									
									while ($row = mysqli_fetch_assoc($result)) {	
									$customer_no = $row["customer_no"];
								
							

	
	$sql = "INSERT INTO `sales_product` (`sales_id`, `product_id`, `quantity`, `price`) VALUES ('$sales_id', '$product_id', '$quantity', '$price');";

	mysqli_query($conn, $sql);

	
	
		
	header("Location: ../addsalesproduct.php?id=$sales_id&no=$customer_no");
	
	
				
							}
								}
				
							}