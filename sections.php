<?php

	require_once('connection.php');
	
	$sql="SELECT * FROM sections";
	$result=mysqli_query($conn,$sql);
	if (!$result) {
		echo "SQL Query Fail!";
	}else{
		while ($section=mysqli_fetch_assoc($result)) {
			$section_list.="<tr>";
			$section_list.="<td>".$section['section']."</td>";

			$section_list.="<td><a href='edit_user.php?user_id=".$section['id']."'><span class='edit-icon-color lnr lnr-pencil'></span></a></td>";
			$section_list.="<td><a href='remove_user.php?user_id=".$section['id']."'><span class='remove-icon-color lnr lnr-trash'></span></a></td>";
			$section_list.="</tr>";								
		}
	}

?>

<!doctype html>
<html lang="en">

<head>
	<title>Sections | Zmeter Production</title>
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
					<div class="row">
					<div class="col-md-6">
					<h3 class="page-title">Sections</h3>
					</div>
					<div class="col-md-6" align="right">
					<a href="add_section.php"><button type="button" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Section</button></a>
					</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<!-- TABLE STRIPED -->
							<div class="panel">
								<div class="panel-body">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Section</th>
												<th>Edit</th>
												<th>Delete</th>
											</tr>
										</thead>
										<tbody>
											<?php echo $section_list; ?>
										</tbody>
									</table>
								</div>
							</div>
							<!-- END TABLE STRIPED -->
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
