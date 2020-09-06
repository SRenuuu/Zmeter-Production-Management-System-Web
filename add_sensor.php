<?php
	session_start();
	require_once('connection.php');

	$sqlb="SELECT * FROM dealers WHERE position ='Branch'";
	$resultb=mysqli_query($conn,$sqlb);
	if ($resultb) {
		while ($branch=mysqli_fetch_assoc($resultb)) {
			$branch_list .="<option value='".$branch['name']."'>".$branch['name']."</option>";
		}
	}

	$sqld="SELECT * FROM dealers WHERE position ='Dealer'";
	$resultd=mysqli_query($conn,$sqld);
	if ($resultd) {
		while ($dealer=mysqli_fetch_assoc($resultd)) {
			$dealer_list .="<option value='".$dealer['name']."'>".$dealer['name']."</option>";
		}
	}

	if (isset($_POST['add'])) {
		
		$msn=$_POST['msn'];
		$ssn=$_POST['ssn'];
		$stype=$_POST['stype'];
		$sdate=$_POST['sdate'];
		$warrenty=$_POST['warrenty'];
		$place=$_POST['place'];


		$sql="INSERT INTO sensor (msn,ssn,stype,saledate,wperiod,place) VALUES ('$msn','$ssn','$stype','$sdate','$warrenty','$place')";
		$result=mysqli_query($conn,$sql);
		if ($result) {
			header('location:sensor.php');
		}else{
			echo "error";
		}
	}

?>

<!doctype html>
<html lang="en">

<head>
	<title>Add Sensor | Zmeter Production</title>
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
					<h3 class="page-title">Add Sensor</h3>
					<div class="row">
						
						<div class="col-md-6">
							
							
							<!-- INPUT GROUPS -->
		<div class="panel">
			<form action="add_sensor.php" method="POST">
				<div class="panel-body">
					<label>Meter Serial No</label>
						<input type="number" class="form-control" name="msn">
						<br>
					<label>Sensor Serial No</label>
						<input type="number" class="form-control" name="ssn">
						<br>
					<label>Type</label>
						<select class="form-control" name="stype">
							<option value="Single Hole">Single Hole</option>
							<option value="3 Hole">3 Hole</option>
							<option value="4 Hole">4 Hole</option>
						</select>
						<br>	
					<label>Sale Date</label>
						<input type="date" class="form-control" name="sdate">
						<br>
					<label>Warrenty</label>
						<select class="form-control" name="warrenty">
							<option value="183">6 Months (183 Days)</option>
							<option value="365">12 Months (365 Days)</option>
						</select>
						<br>
					<label>Place</label>
						<select class="form-control" name="place">
							<optgroup label="Branches" >
								<?php echo $branch_list; ?>
							</optgroup>
							<optgroup label="Dealers" >
								<?php echo $dealer_list; ?>
							</optgroup>
						</select>
						<br>	
									<div class="col-md-6">
										<a href="sensor.php"><button type="button" class="btn btn-danger btn-block"><i class="fa fa-close"></i> Cancel</button></a>
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
