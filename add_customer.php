<?php
	session_start();
	require_once('connection.php');

	if (isset($_POST['add'])) {
		
		$name=$_POST['cname'];
		$nic=$_POST['nic'];
		$tel=$_POST['tel'];
		$msn=$_POST['msn'];

		$sql="INSERT INTO customer VALUES('','$name','$nic','$tel','$msn');";
		$result=mysqli_query($conn,$sql);
		if ($result) {
			header('location:customers.php');
		}else{
			echo "error";
		}
	}

?>

<!doctype html>
<html lang="en">

<head>
	<title>Add Customer | Zmeter Production</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<?php require_once('nav.php'); ?>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<?php require_once('sidebar.php'); ?>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Add Customer</h3>
					<div class="row">
						
						<div class="col-md-6">
							
							
							<!-- INPUT GROUPS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">New Customer Details</h3>
								</div>
								<form action="add_customer.php" method="POST">
								<div class="panel-body">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input class="form-control" placeholder="Name" type="text" name="cname" required="">
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-id-card"></i></span>
										<input class="form-control" placeholder="NIC No" type="text" name="nic" required="">
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-phone"></i></span>
										<input class="form-control" placeholder="Tel No" type="text" name="tel" required="">
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-window-maximize"></i></span>
										<input class="form-control" placeholder="Meter S/N" type="text" name="msn" required="">
									</div>
									<br>	
									<div class="col-md-6">
										<a href="customers.php"><button type="button" class="btn btn-danger btn-block"><i class="fa fa-close"></i> Cancel</button></a>
									</div>
									<div class="col-md-6">
										<button type="submit" name="add" class="btn btn-primary btn-block"><i class="fa fa-plus-circle"></i> Add</button>
									</div>
								</div>
								</form>
							</div>
							<!-- END INPUT GROUPS -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<?php require_once('footer.php'); ?>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
</body>

</html>
