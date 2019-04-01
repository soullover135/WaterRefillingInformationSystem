<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link href="css/style.css" rel="stylesheet">
</head>
<body>
		<table class="table table-hover table-secondary ">
		  <thead>
			<tr>
					<th scope="col"><a class="text-info" href="home.php">
	<?php
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
						
					<th scope="col"><a class="text-info" style="float: right;"><form action="includes/logout.inc.php" method="POST"><button type="submit" name="submit" class="btn btn-primary">Logout <i class="fas fa-sign-out-alt    "></i></button></form></a></th>
			</tr>
		  </thead>
		</table>
	<div class="container">
	<center>
	<form>
		<button type="submit" name="cancel" class="btn btn-light"><a href="viewproduct.php">Products</a></button>
		<button type="submit" name="cancel" class="btn btn-light"><a href="viewemployee.php">Employee</a></button>
		<button type="submit" name="cancel" class="btn btn-light"><a href="viewcustomer.php">Customer</a></button>
		<button type="submit" name="cancel" class="btn btn-light"><a href="sales.php">Sales</a></button>
		<button type="submit" name="cancel" class="btn btn-light"><a href="changepassword.php">Change Password</a></button>	<br/><br/>
		
	</form>
</center>
	</div>
	<div class="container" style="width: 450px ; drop shadow rectangle">
		<form action = "includes/editcustomer.inc.php" method="POST">
				
					<?php
				include_once 'includes/dbh.inc.php';
				$user_id = $_SESSION['u_id'];
				$customer = $_GET['id'];
				$sql = "SELECT * 
						FROM customer AS p 
						JOIN users AS r 
						WHERE p.user_id = $user_id  
						AND r.user_id = $user_id AND customer_no = $customer;";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
				
				if ($resultCheck > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
				?>

				  <label for="inputName">Name</label>
				  <div class="row">
					<div class="col-6">		
						<input type="hidden" class="form-control" name="customer_no" value="<?php echo $row["customer_no"];?>" style="width: 195px;" >			
					  <input type="text" class="form-control" name="first_name" value="<?php echo $row["first_name"]; ?>" style="width: 195px;" required>
					</div>
					<div class="col-6">					
					  <input type="text" class="form-control" name="last_name" value="<?php echo $row["last_name"]; 	?>" style="width: 192px;" required>
					</div>
				  </div><br/>				
				  <div class="form-group">
					<label for="inputContact">Contact number</label>
					<input type="text" class="form-control" name="contact_no" value="<?php echo $row["contact_no"]; 	?>" required>
				  </div>
				  <div class="form-group">
					<label for="inputAddress">Address</label>
					<input type="text" class="form-control" name="address" value="<?php echo $row["address"]; 	?>" required>
				  </div>
				   <?php		}
				
				}
				?>
				  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
				  <button class="btn btn-light"><a href="viewcustomer.php">Cancel</a></button>


		</form>
	</div>
</body>
</html>
	
	
	
	
	
	
	
	