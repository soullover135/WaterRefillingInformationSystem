<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="fontawesome/css/all.css">
	<link href="css/style.css" rel="stylesheet">
</head>
<body>
		<table class="table table-hover table-secondary ">
		  <thead>
			<tr>
					<th scope="col"><a class="text-info" href="home.php">
	<i class="fas fa-home"></i><?php
		if(isset($_SESSION['u_id'])){
			echo ($_SESSION['u_first']);
			echo ' ';
			echo ($_SESSION['u_last']);
		}
		else{
			header("Location: index.php");
		}
	?></a></th>
					</th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th></th><th scope="col" ></th>
					<th scope="col">
						<p id ="example" ></p>
						<script>
							var display=setInterval(function(){Time()},0);

							function Time()
							{
								var date=new Date();
								var time=date.toLocaleTimeString();
								document.getElementById("example").innerHTML=time;
							}
						</script>
					</th>
					<th scope="col"><a class="text-info" style="float: right;"><form action="includes/logout.inc.php" method="POST"><button type="submit" name="submit" class="btn btn-primary">Logout</button></form></a></th>
			</tr>
		  </thead>
		</table>


		<div class="container">
		  	<div class="row">
					<div class="col-5"><font style="font-family:proza;"><h1><b>Checkout</b></h1></font>	<br>
		
		<form action = "includes/addsalesproduct.inc.php" method="GET">
			
				<?php
				$sales_id = $_GET['id'];
				?>
				Transaction ID : 
				<input type="text" class="form-control" style="width: 100px;" name="sales_id" value="<?php echo $sales_id; ?>" readonly>	
							Customer Name : 
							<?php
								include_once 'includes/dbh.inc.php';
								$user_id = $_SESSION['u_id'];
								
								$no = $_GET['no'];
								$sql = "SELECT * 
										FROM customer AS p 
										JOIN users AS r 
										WHERE p.user_id = $user_id  
										AND r.user_id = $user_id AND customer_no=$no;";
								$result = mysqli_query($conn, $sql);
								$resultCheck = mysqli_num_rows($result);
								
								if ($resultCheck > 0) {
									while ($row = mysqli_fetch_assoc($result)) {
											
							?>
							
							<input type="text" class="form-control" style="width: 150px;" name="customer_no" value="<?php echo $row["first_name"]; ?>" readonly>
							
							<?php		}
				
							}
							?>
				
				
				<label for="inputName">Product</label>
					
						<select class="form-control"  style="width: 314px;" name = "product_id" required >
							<option value="">Please select the name of the product</option>
						<?php
							include_once 'includes/dbh.inc.php';
							$user_id = $_SESSION['u_id'];
							$sql = "SELECT * 
									FROM product AS p 
									JOIN users AS r 
									WHERE p.user_id = $user_id  
									AND r.user_id = $user_id;";
							$result = mysqli_query($conn, $sql);
							$resultCheck = mysqli_num_rows($result);
							
							if ($resultCheck > 0) {
								while ($row = mysqli_fetch_assoc($result)) {
						?>
							
							<option value="<?php echo $row["product_id"];?>"><?php echo $row["desciption"];?> (&#8369; <?php echo $row["price"];?>)</option>
						<?php		}
			
						}
						?>
						</select>
						
				<label for="inputName">Quantity</label>
					
					  <input type="number" class="form-control" name="quantity" placeholder="quantity" style="width: 100px;" required>
					
						<br/>
						
				
					<?php $customer = $_GET['no']; ?>
				  
				  <button type="submit" name="submit" class="btn btn-primary">Add to Cart</button>
				  <button class="btn btn-light"><a href="checkoutsummary.php?id=<?php echo $sales_id; ?>&no=<?php echo $customer; ?>">Done</a></button>
		</form>
		<br><br>



					</div>






					<div class="col-7">

						<div class="container">
	<form>
	<font style="font-family:proza;"><center ><b><h1> Cart</b></h1></center><br>
		
		
		<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Product ID</th>
      <th scope="col">Description</th>
      <th scope="col">Quantity</th>
      <th scope="col"> Price </th>
      <th scope="col">Subtotal</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  				<?php
				include_once 'includes/dbh.inc.php';
				$user_id = $_SESSION['u_id'];
				$sales_id = $_GET["id"];
				$sql = "SELECT * FROM sales_product, product, sales WHERE sales_product.product_id = product.product_id AND sales.sales_id = sales_product.sales_id AND sales.sales_id = $sales_id;";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
				$total=0;
				if ($resultCheck > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
					$savequantity = $row["quantity"];
					$saveprice = $row["price"];	
					$quantityprice = $savequantity*$saveprice;
					$sales_id = $row["sales_id"];
					$total += $quantityprice;


					
				?>



    <tr>
	      <td><?php echo $row["product_id"];?></td>
	      <td><?php echo $row["product_id"];?></td>
      <td><center><?php echo $row["quantity"];?></center></td>
      <td>&#8369; <?php echo $row["price"];?></td>
      <td>&#8369; <?php echo $quantityprice;?>.00</td>
      <td><a href="includes/deletesalesproduct.inc.php?id=<?php echo $row["product_id"];?>&sales_id=<?php echo $row["sales_id"];?>"> Delete </a></td>
    </tr>
    <?php		}
				
				}
				?>
  </tbody>
</table>
<div align="right">
	<b><h3>TOTAL  </h3><h1>&#8369;
<?php 
					
					 echo $total;?>.00
					 </h1></b><center>
	</div>	
		
		
	</form>
	</div>
					</div>
					<br><br>
			</div>


	
</body>
</html>