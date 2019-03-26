<?php
require('dbh.inc.php');
$id=$_GET['id'];

$sales_id=$_GET['sales_id'];

$query = "DELETE FROM sales_product WHERE sales_id = $sales_id AND product_id=$id;"; 
$result = mysqli_query($conn,$query) ;

		$sql = "SELECT * 
						FROM sales WHERE sales_id =$sales_id ;";
							$result = mysqli_query($conn, $sql);
							$resultCheck = mysqli_num_rows($result);
							
							if ($resultCheck > 0) {
								while ($row = mysqli_fetch_assoc($result)) {	
								$sales_id = $row["sales_id"];
								$customer_no = $row["customer_no"];
								
								
header("Location: ../addsalesproduct.php?id=$sales_id&no=$customer_no");
							
							}
			
						}
							
?>