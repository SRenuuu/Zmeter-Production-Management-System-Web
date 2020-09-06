<?php
	session_start();
	require_once('connection.php');

	$sqlload="SELECT * FROM sections";
	$resultload=mysqli_query($conn,$sqlload);
	if ($resultload) {
		while ($sections=mysqli_fetch_assoc($resultload)) {
			$section_list .= "<option value='".$sections['section']."'>".$sections['section']."</option>";
		}
	}

	if (isset($_POST['add'])) {
		
		$username=$_POST['username'];
		$email=$_POST['email'];
		$rest="@zmeterpro.com";
		$pw=$_POST['password'];
		$password=sha1($_POST['password']);
		$section=$_POST['section'];

		$sql="INSERT INTO users VALUES('','$username','$email$rest','$password','$section');";
		$result=mysqli_query($conn,$sql);
		if ($result) {
			header('location:users.php');
		}else{
			echo "error";
		}
	}

?>

<!doctype html>
<html lang="en">

<head>
	<title>Add User | Zmeter Production</title>
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
					<h3 class="page-title">Add User</h3>
					<div class="row">
						
						<div class="col-md-6">
							
							
							<!-- INPUT GROUPS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Add new Account</h3>
								</div>
								<form action="add_user.php" method="POST">
								<div class="panel-body">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input class="form-control" placeholder="Username" type="text" name="username" required="">
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-at"></i></span>
										<input class="form-control" name="email" type="text" autocomplete="off">
										<span class="input-group-addon">@zmeterpro.com</span>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-key"></i></span>
										<input class="form-control" placeholder="Password" type="password" name="password" required="">
									</div>
									<br>
									<select class="form-control" name="section" required="">
									<?php echo $section_list; ?>
									</select>
									<br>	
									<div class="col-md-6">
										<a href="users.php"><button type="button" class="btn btn-danger btn-block"><i class="fa fa-close"></i> Cancel</button></a>
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
