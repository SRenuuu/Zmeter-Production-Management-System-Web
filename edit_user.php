<?php
	session_start();
	require_once('connection.php');

	if (!isset($_POST['save'])) {
		
		$sql="SELECT * FROM users WHERE id='{$_GET['user_id']}'";
	$result=mysqli_query($conn,$sql);
	if (!$result) {
		echo "SQL Query Fail!";
	}else{
		$users=mysqli_fetch_assoc($result);
	}

	}else{
		$email=$_POST['email'];
		$section=$_POST['section'];
		$password=sha1($_POST['password']);

		$sql="UPDATE users SET email='$email',section='$section',password='$password' WHERE id='{$_POST['email']}'";
		$result=mysqli_query($conn,$sql);
		if (!$result) {
			echo "SQL Query Fail!";
		}else{
			header('location:users.php');
		}

	}

?>

<!doctype html>
<html lang="en">

<head>
	<title>Edit User | Zmeter Production</title>
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
					<h3 class="page-title">Edit User</h3>
					<div class="row">
						
						<div class="col-md-6">
							
							
							<!-- INPUT GROUPS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Update <?php echo $users['username']."'s"; ?> Account</h3>
								</div>
								<form action="edit_user.php" method="POST">
								<div class="panel-body">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input class="form-control" placeholder="Username" type="text" name="username" value="<?php echo $users['username']; ?>" disabled>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-at"></i></span>
										<input class="form-control" placeholder="E-mail" type="text" name="email" value="<?php echo $users['email']; ?>">
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-key"></i></span>
										<input class="form-control" placeholder="Password" type="password" name="password" value="<?php echo $users['password']; ?>">
									</div>
									<br>
									<select class="form-control" name="section">
									<optgroup label="Selected">
										<option value="<?php echo $users['section']; ?>"><?php echo $users['section']; ?></option>
										</optgroup>
										<optgroup label="Existing">
										<option value="office">Office</option>
										<option value="production">Production</option>
										<option value="reception">Reception</option>
										</optgroup>
									</select>
									<br>	
									<div class="col-md-6">
										<a href="users.php"><button type="button" class="btn btn-danger btn-block"><i class="fa fa-close"></i> Cancel</button></a>
									</div>
									<div class="col-md-6">
										<button type="submit" name="save" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Save</button>
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
