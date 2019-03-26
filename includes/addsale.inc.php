<?php
	session_start();
	include_once 'dbh.inc.php';
	$user_id = $_SESSION['u_id'];
	
	$customer_no = mysqli_real_escape_string($conn, $_POST['customer_no']);
	$sql = "INSERT INTO `sales` (`sales_id`, `customer_no`, `curdate`, `curtime`) VALUES (NULL, '$customer_no', CURRENT_DATE, CURRENT_TIME);";
	mysqli_query($conn, $sql);
	
							$sql = "SELECT * 
									FROM sales;";
							$result = mysqli_query($conn, $sql);
							$resultCheck = mysqli_num_rows($result);
							
							if ($resultCheck > 0) {
								while ($row = mysqli_fetch_assoc($result)) {	
								$sales_id = $row["sales_id"];
								
								
								
							header("Location: ../addsalesproduct.php?id=$sales_id&no=$customer_no");
							
							}
			
						}
							
?>