<?php

	require_once('connection.php');
	
	if (isset($_POST['item'])) {
		$count='0';
		$sql="SELECT * FROM customer WHERE name LIKE '%{$_POST['item']}%' or nic LIKE '%{$_POST['item']}%' or tel LIKE '%{$_POST['item']}%' or msn LIKE '%{$_POST['item']}%'";
		$result=mysqli_query($conn,$sql);
		if (!$result) {
			echo "SQL Search Query Fail!";
		}else{
			while ($customers=mysqli_fetch_assoc($result)) {
				$customer_list.="<tr>";
				$customer_list.="<td>".$customers['name']."</td>";
				$customer_list.="<td>".$customers['nic']."</td>";
				$customer_list.="<td>".$customers['tel']."</td>";
				$customer_list.="<td>".$customers['msn']."</td>";
				$customer_list.="<td><a href='edit_user.php?user_id=".$customers['id']."'><span class='edit-icon-color lnr lnr-pencil'></span></a></td>";
				$customer_list.="<td><a href='remove_user.php?user_id=".$customers['id']."'><span class='remove-icon-color lnr lnr-trash'></span></a></td>";
				$customer_list.="</tr>";
				$count=$count+1;
		}
	}


	}else{

	$sql="SELECT * FROM customer LIMIT 10";
	$result=mysqli_query($conn,$sql);
	if (!$result) {
		echo "SQL Query Fail!";
		}else{
			while ($customers=mysqli_fetch_assoc($result)) {
				$customer_list.="<tr>";
				$customer_list.="<td>".$customers['name']."</td>";
				$customer_list.="<td>".$customers['nic']."</td>";
				$customer_list.="<td>".$customers['tel']."</td>";
				$customer_list.="<td>".$customers['msn']."</td>";
				$customer_list.="<td><a href='edit_user.php?user_id=".$customers['id']."'><span class='edit-icon-color lnr lnr-pencil'></span></a></td>";
				$customer_list.="<td><a href='remove_user.php?user_id=".$customers['id']."'><span class='remove-icon-color lnr lnr-trash'></span></a></td>";
				$customer_list.="</tr>";								
			}
		}

		//query for count customers
		$count='0';
		$csql="SELECT * FROM customer";
		$cresult=mysqli_query($conn,$csql);
		if ($result) {
			while ($cusno=mysqli_fetch_assoc($cresult)) {
				$count=$count+1;
			}
				
		}
	}

?>

<!doctype html>
<html lang="en">

<head>
	<title>Customers | Zmeter Production</title>
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
					<div class="col-md-3">
					<h3 class="page-title">Customers</h3>
					</div>

					<div class="col-md-4" align="center">
                        <form action="customers.php" method="POST">
                            <div class="input-group">
                                <input type="text" value="" name="item" class="form-control" placeholder="Search (Name, NIC, Phone, SN)">
                                <span class="input-group-btn"><button type="submit" name="search" class="btn btn-success">Search</button></span>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-3">
                    <div class="cus-alert alert-info">
                                <?php echo $count; ?> Results Found !
                            </div>
                    </div>
							
					

					<div class="col-md-2" align="right">
					<a href="add_customer.php"><button type="button" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Customer</button></a>
					</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
								
								<div class="panel-body">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Name</th>
												<th>NIC</th>
												<th>Phone</th>
												<th>Meter S/N</th>
												<th>Edit</th>
												<th>Delete</th>
											</tr>
										</thead>
										<tbody>
											<?php echo $customer_list; ?>
											<?php echo $customer_search_list; ?>
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
