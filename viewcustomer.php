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
	<div class="container">
	<form>
		<button type="submit" name="cancel" class="btn btn-light"><a href="addcustomer.php"><i class="fas fa-plus-circle    "></i>Add Customer</a></button>
			<br/><br/>
		<table class="table table-hover">
		  <thead class="thead-dark">
			<tr>
			  <th scope="col">Customer ID</th>
			  <th scope="col">Name</th>
			  <th scope="col">Contact #</th>
			  <th scope="col">Address</th>
			  <th scope="col">Action</th>
			</tr>
		  </thead>
		  <tbody>
			<?php
				include_once 'includes/dbh.inc.php';
				$user_id = $_SESSION['u_id'];
				$sql = "SELECT * 
						FROM customer AS p 
						JOIN users AS r 
						WHERE p.user_id = $user_id  
						AND r.user_id = $user_id;";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
				
				if ($resultCheck > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
				?>
			<tr>
			  <th scope="row"><?php echo $row["customer_no"];?></th>
			  <td><?php echo $row["first_name"]; echo " "; echo $row["last_name"]; ?></td>
				<td><?php echo $row["contact_no"]; 	?> </td>
				<td><?php echo $row["address"]; 	?> </td>
			  <td><a class="text-primary" href="editcustomer.php?id=<?php echo $row["customer_no"]; ?>"><i class="fas fa-user-edit    "></i> Edit </a><a class="text-danger"  href="includes/deletecustomer.inc.php?id=<?php echo $row["customer_no"]; ?>"> <i class="fa fa-trash" aria-hidden="true"></i> Delete</a></td>
			</tr>
			<?php		}
				
				}
				?>
		  </tbody>
		</table>
	</form>
	</div>
</body>  
</html>