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
		<button type="submit" name="cancel" class="btn btn-light"><a href="changepassword.php">Change Password</a></button>
			<br/><br/>
		
	</form>
</center>

			<div class="container" style="width: 450px ; drop shadow rectangle">
		<form action = "includes/changepassword.inc.php" method="POST">
				<br><br>
				  <label for="inputName">Old Password</label>
				  <div class="row">
					<div class="col-6">					
					  <input type="password" class="form-control" name="oldpassword" placeholder="first name" style="width: 195px;" required>
					</div>
					<div class="col-6">					
					</div>
				  </div><br/>		
				   <label for="inputName">New Password</label>		
				  <div class="form-group">
					<input type="password"  class="form-control" name="newpassword" placeholder="first name" style="width: 195px;" pattern=".{8,}"   required title="8 characters minimum" required>
				  </div>
				   <label for="inputName">Confirm New Password</label>
				  <div class="form-group">
					<input type="password"  class="form-control" name="confirmnewpassword" placeholder="first name" style="width: 195px;" pattern=".{8,}"   required title="8 characters minimum" required>
				  </div>
				  <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-check    "></i> Submit</button>
				  <button class="btn btn-light"><a href="home.php"><i class="fas fa-arrow-circle-left    "></i> Cancel</a></button>
		</form>
	</div>
	</div>
</body>  
</html>