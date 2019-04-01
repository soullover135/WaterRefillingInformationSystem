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
<body class="container mainbox" style="width:450px;"><br/><br/>
		<br/><br/><br/><table class="table table-hover table-secondary ">
		  <thead>
			<tr>
					<th scope="col"><a href="index.html" class="text-info"></a></th>
					<th scope="col"></th>
					<th scope="col"></th>
					<th scope="col" class = "font-weight-bold"><center>Log in</center></th>
					<th scope="col"></th>
					<th scope="col"></th>
					<th scope="col"><a href="list.html" class="text-info" style="float: right;"></a></th>
			</tr>
		  </thead>
		  
		</table>
	<div class="container" style="width: 350px ; drop shadow rectangle">
		<form action = "includes/login.inc.php" method="POST">
				<br/>
				  <label for="exampleInputname">Username</label>				
					  <input type="text" name="uid" class="form-control" placeholder="Username"  ><br/>
				  <div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" name="pwd" class="form-control"  placeholder="Password" >
				  </div>
				  <button type="submit" name="submit" class="btn btn-primary" style="width:318px" ><i class="fas fa-sign-in-alt    "></i> Login</button><br><br>
				  <p>Don't have an account? </a><a href="signup.php"> Sign up</a>
		</form>
	</div>
	<section href="signup.php">
	</section>
	
	<br/><br/><br/>			  
</html>
  
	
