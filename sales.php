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
					
					<th scope="col"><a class="text-info" style="float: right;"><form action="includes/logout.inc.php" method="POST"><button type="submit" name="submit" class="btn btn-primary">Logout</button></form></a></th>
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
	<br/>
	<div class="container" style="center">
	<form action = "search.php" method="GET" >
	
				
				  <div class="row" >
						 <p align="center">FROM: </p>
					  <input type="date" class="form-control" name="startdate" placeholder="first name" style="width: 195px;" required>
					  <p align="center">TO: </p>
					  <input type="date" class="form-control" name="enddate" placeholder="last name" style="width: 192px;" required>
									
				  <br/>			
				  <button type="submit" class="btn btn-primary">Submit</button>
				  <button class="btn btn-light"><a href="sales.php">Reset</a></button>
				  </div>
				
		</form>
		 </div>
	
		<br/>
	<form>
		<button type="submit" name="cancel" class="btn btn-light"><a href="addsale.php"><i class="fas fa-plus-circle    "></i>Add Sale</a></button>
			<br/><br/>
			
			
					<table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sales ID</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Amount</th>
	  <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  				<?php
				include_once 'includes/dbh.inc.php';
				$user_id = $_SESSION['u_id'];
					$from = "2019-03-19";
					$to = "2019-03-19";

					

					$sql = "SELECT sales_id, customer_no, curdate, curtime, SUM(price*quantity) FROM sales full inner join sales_product USING(sales_id)  GROUP by sales_id desc ;";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);
					if ($resultCheck > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
						$sales_id = $row["sales_id"];
						$sum = $row["SUM(price*quantity)"];
						$curdate = $row["curdate"];
						$curtime = $row["curtime"];
						$customer_no = $row["customer_no"];
						

							/*$sql = "SELECT * FROM sales, customer WHERE sales.customer_no = customer.customer_no AND sales_id = $sales_id ;";
							$result = mysqli_query($conn, $sql);
							$resultCheck = mysqli_num_rows($result);
							
								while ($row = mysqli_fetch_assoc($result)) {
								$first_name = $row["first_name"];

						$sql = "SELECT * FROM sales, customer WHERE sales.customer_no = customer.customer_no GROUP BY sales_id ;";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0) {
							while ($row = mysqli_fetch_assoc($result)) {
							$sales_id = $row["sales_id"];
							$name = $row["first_name"];
							$date = $row["date"];*/
				?>



    <tr>
	      <td><?php echo $sales_id?></td>
	      <td><?php echo $customer_no;?></td>
      <td><?php echo $curdate;?></td>
      <td><?php echo $curtime;?></td>

      <td>&#8369; <?php echo $sum;?></td>
	  <td> <button class="btn btn-light"><a href="viewcheckoutsummary.php?id=<?php echo $sales_id; ?>&no=<?php echo $customer_no; ?>">View</a></button></td>
      
    </tr>
    <?php		
			}
				}
				?>
  </tbody>
</table>
		
		
		
		
	</form>
	<br/><br/>
	</div>
	<br/><br/><br/><br/><br/><br/>
</body>  
</html>	