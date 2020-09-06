<?php
	session_start();
	require_once('connection.php');

	if (isset($_POST['add'])) {
		
		$msn=$_POST['msn'];
		$ssn=$_POST['ssn'];
		$sdate=$_POST['sdate'];

		$sql="INSERT INTO sensor (msn,ssn,saledate) VALUES ('$msn','$ssn','$sdate')";
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
	<title>Add Daily Repair | Zmeter Production</title>
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
					<h3 class="page-title">Add Repair</h3>
					<div class="row">
						
						<div class="col-md-10">
							
							
							<!-- INPUT GROUPS -->
	<div class="panel">
		
		<form action="add_daily_repair.php" method="POST">
			<div class="panel-body">
				<label>Fixed Date</label>
					<input type="date" name="fdate" class="form-control">
					<br>
				<label>Warrenty</label>
					<label class="fancy-radio">
						<input name="warrenty" name="warrenty" value="yes" type="radio">
							<span><i></i>Yes</span>
						<input name="warrenty" name="warrenty" value="no" type="radio">
							<span><i></i>No</span>
					</label>
					<br>
				<label>Meter Serial No</label>
					<input type="number" name="msn" class="form-control">
					<br>
				<label>Customer Name</label>
					<input type="text" name="cusname" class="form-control">
					<br>
				<label>Mobile No</label>
					<input type="number" name="phone" class="form-control">
					<br>
				<label>Fault</label>
					
						<table class="table-form">
							<tr>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="fault[]" value="No Power">
									<span>No Power</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="fault[]" value="Time Change">
									<span>Time Change</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="fault[]" value="Button">
									<span>Button</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="fault[]" value="Taxi Light Short" >
									<span>Taxi Light Short</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="fault[]" value="Back Cover" >
									<span>Back Cover</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="fault[]" value="Front Cover" >
									<span>Front Cover</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="fault[]" value="Segments" >
									<span>Segments</span>
									</label>
								</td>
							</tr>
							<tr>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="fault[]" value="Sensor Light" >
									<span>Sensor Light</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="fault[]" value="Taxi Light Not Work" >
									<span>Taxi Light Not Work</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="fault[]" value="Remort Not Work" >
									<span>Remort Not Work</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="fault[]" value="Lens Not Clear" >
									<span>Lens Not Clear</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="fault[]" value="Service" >
									<span>Service</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="fault[]" value="Waiting Issue" >
									<span>Waiting Issue</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="fault[]" value="KM Issue" >
									<span>KM Issue</span>
									</label>
								</td>
							</tr>
							<tr>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="fault[]" value="Price Issue" >
									<span>Price Issue</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="fault[]" value="Printer Port" >
									<span>Printer Port</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="fault[]" value="Hire Issue" >
									<span>Hire Issue</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="fault[]" value="Meter Short" >
									<span>Meter Short</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="fault[]" value="Buffel Connector" >
									<span>Buffel Connector</span>
									</label>
								</td>
							</tr>
						</table>
						<br>
				<label>Replacement</label>
					
						<table class="table-form">
							<tr>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="replacement" value="Battery">
									<span>Battery</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="replacement" value="Diodes">
									<span>Diodes</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="replacement" value="Resistors">
									<span>Resistors</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="replacement" value="Buttons">
									<span>Buttons</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="replacement" value="Link / Path">
									<span>Link / Path</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="replacement" value="ULN IC">
									<span>ULN IC</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="replacement" value="Regulator">
									<span>Regulator</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="replacement" value="Buffel Connector">
									<span>Buffel Connector</span>
									</label>
								</td>
							</tr>
							<tr>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="replacement" value="Segments">
									<span>Segments</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="replacement" value="Transistors">
									<span>Transistors</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="replacement" value="Pf / Cristal">
									<span>Pf / Cristal</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="replacement" value="LED">
									<span>LED</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="replacement" value="TIP">
									<span>TIP</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="replacement" value="Main IC">
									<span>Main IC</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="replacement" value="Inductor">
									<span>Inductor</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="replacement" value="Serial Change">
									<span>Serial Change</span>
									</label>
								</td>
							</tr>
							<tr>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="replacement" value="Capacitor">
									<span>Capacitor</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="replacement" value="IC Base">
									<span>IC Base</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="replacement" value="IC Programe">
									<span>IC Programe</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="replacement" value="Lens">
									<span>Lens</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="replacement" value="Front Panel">
									<span>Front Panel</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="replacement" value="Board Change">
									<span>Board Change</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="replacement" value="No Fault Found">
									<span>No Fault Found</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="replacement" value="New IC">
									<span>New IC</span>
									</label>
								</td>
							</tr>
							<tr>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="replacement" value="Printer Port">
									<span>Printer Port</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="replacement" value="IR Sensor">
									<span>IR Sensor</span>
									</label>
								</td>
								<td>
									<label class="fancy-checkbox">
									<input type="checkbox" name="replacement" value="Lense Change">
									<span>Lense Change</span>
									</label>
								</td>
							</tr>
						</table>
						<br>
					<label>Charge</label>
					<input type="text" class="form-control">
					<br>

					<div align="right">
						<button type="submit" name="save" class="btn btn-primary btn-sm"><span class="lnr lnr-download"></span> Submit</button>
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
