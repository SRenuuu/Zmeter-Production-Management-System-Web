<?php 

	require_once('connection.php');
	
	if (isset($_POST['search'])) {
		$count='0';
		$sql="SELECT * FROM sensor WHERE msn LIKE '%{$_POST['item']}%' or ssn LIKE '%{$_POST['item']}%' or saledate LIKE '%{$_POST['item']}%' or place LIKE '%{$_POST['item']}%' GROUP BY ssn";
		$result=mysqli_query($conn,$sql);
		if (!$result) {
			echo "SQL Search Query Fail!";
		}else{
			while ($sensors=mysqli_fetch_assoc($result)) {
				$sensor_search_list.="<tr>";
				$sensor_search_list.="<td>".$sensors['msn']."</td>";

				$sqlnew="SELECT COUNT(*) as total FROM sensor WHERE ssn='{$sensors['ssn']}'";
				$resultnew=mysqli_query($conn,$sqlnew);
				if ($resultnew) {
					$sens=mysqli_fetch_assoc($resultnew);
					if ($sens['total']>1) {

						$sqllist="SELECT * FROM sensor WHERE ssn='{$sensors['ssn']}'";
						$resultlist=mysqli_query($conn,$sqllist);
						while ($newlist=mysqli_fetch_assoc($resultlist)) {
							$new_list .="<tr>";
							$new_list .="<td>".$newlist['ssn']."</td>";
							$new_list .="</tr>";
						}

						$sensor_search_list.="<td>".$sensors['ssn'] ." <span class='lnr lnr-arrow-right'></span> <a href='#subSensor' data-toggle='collapse' class='collapsed'> ". $sens['total']." </a>
						<div id='subSensor' class='collapse'>
								<table class='table table-striped'>
						
										<tbody>
												".$new_list."
										</tbody>
									</table>
							</div></td>";
					}else{
						$sensor_search_list.="<td>".$sensors['ssn'] ."</td>";
					}
					
				}
				$sensor_search_list.="<td>".$sensors['stype'] ."</td>";
				$sensor_search_list.="<td>".$sensors['saledate']."</td>";
				
				if ($sensors['wperiod'] == '183') {
					$sensor_search_list.="<td>6 Months</td>";
				}elseif ($sensors['wperiod'] == '365') {
					$sensor_search_list.="<td>12 Months</td>";
				}else{
					$sensor_search_list.="<td>0</td>";
				}
				
				
				$date1=date_create($sensors['saledate']);
				$date2=date_create(date("Y-m-d"));
				$diff=date_diff($date1,$date2);
				$warrenty = $diff->format("%R%a days");
				$warrentynew=365-$warrenty;

				if ($warrentynew>=0) {
					$sensor_search_list.="<td><span class='label label-success'>".$warrentynew." Days</span></td>";
				}else{
					$sensor_search_list.="<td><span class='label label-danger'>No Warrenty</span></td>";
				}

				$sensor_search_list.="<td>".$sensors['place']."</td>";

				$sensor_search_list.="<td><a href='edit_sensor.php?sensor_id=".$sensors['id']."'><span class='edit-icon-color lnr lnr-pencil'></span></a></td>";

				$sensor_search_list.="<td><a href='remove_sensor.php?sensor_id=".$sensors['id']."'><span class='remove-icon-color lnr lnr-trash'></span></a></td>";

				$sensor_search_list.="</tr>";	
				$count=$count+1;
		}
	}


	}else{
		$pg=0;
	$sql="SELECT * FROM sensor GROUP BY ssn DESC";
	$result=mysqli_query($conn,$sql);
	if (!$result) {
		echo "SQL Query Fail!";
		}else{
			while ($sensors=mysqli_fetch_assoc($result)) {
				$sensor_list.="<tr>";
				$sensor_list.="<td>".$sensors['msn']."</td>";

				$sqlnew="SELECT ssn,COUNT(*) as total FROM sensor WHERE ssn='{$sensors['ssn']}'";
				$resultnew=mysqli_query($conn,$sqlnew);
				if ($resultnew) {
					$sens=mysqli_fetch_assoc($resultnew);
					if ($sens['total']>1) {

						$sqllist="SELECT * FROM sensor WHERE ssn='{$sensors['ssn']}'";
						$resultlist=mysqli_query($conn,$sqllist);
						while ($newlist=mysqli_fetch_assoc($resultlist)) {
							$new_list .="<tr>";
							$new_list .="<td>".$newlist['ssn']."</td>";
							$new_list .="<td>".$newlist['stype']."</td>";
							$new_list .="<td><a href='sensor_full_details.php?sensor_sn=".$sens['ssn']."'>View more</a></td>";
							$new_list .="</tr>";
						}

						
						

						$sensor_list.="<td>".$sensors['ssn'] ." <span class='lnr lnr-arrow-right'></span> <a href='#subSensor".$pg."' data-toggle='collapse' class='collapsed'> ". $sens['total']." </a>
						<div id='subSensor".$pg."' class='collapse'>
								<table class='table table-striped'>
						
										<tbody>
											".$new_list."
										</tbody>
									</table>
							</div></td>";
					}else{
						$sensor_list.="<td>".$sensors['ssn'] ."</td>";
					}
					
				}

				$sensor_list.="<td>".$sensors['stype'] ."</td>";
				$sensor_list.="<td>".$sensors['saledate']."</td>";

				if ($sensors['wperiod'] == '183') {
					$sensor_list.="<td>6 Months</td>";
				}elseif ($sensors['wperiod'] == '365') {
					$sensor_list.="<td>12 Months</td>";
				}else{
					$sensor_list.="<td>0</td>";
				}
				
				$date1=date_create($sensors['saledate']);
				$date2=date_create(date("Y-m-d"));
				$diff=date_diff($date1,$date2);
				$warrenty = $diff->format("%R%a days");

				if ($sensors['wperiod'] == '183') {
					$warrentynew=183-$warrenty;
				}elseif ($sensors['wperiod'] == '365') {
					$warrentynew=365-$warrenty;
				}else{
					$warrentynew=0-$warrenty;
				}
				

				if ($warrentynew>=0) {
					$sensor_list.="<td><span class='label label-success'>".$warrentynew." Days</span></td>";
				}else{
					$sensor_list.="<td><span class='label label-danger'>No Warrenty</span></td>";
				}

				$sensor_list.="<td>".$sensors['place']."</td>";

				$sensor_list.="<td><a href='edit_sensor.php?sensor_id=".$sensors['id']."'><span class='edit-icon-color lnr lnr-pencil'></span></a></td>";

				$sensor_list.="<td><a href='remove_sensor.php?sensor_id=".$sensors['id']."'><span class='remove-icon-color lnr lnr-trash'></span></a></td>";

				$sensor_list.="</tr>";	

				$pg=$pg+1;							
			}
		}

		//query for count customers
		$count='0';
		$ssql="SELECT * FROM sensor";
		$sresult=mysqli_query($conn,$ssql);
		if ($result) {
			while ($sensorno=mysqli_fetch_assoc($sresult)) {
				$count=$count+1;
			}
				
		}
	}

?>

<!doctype html>
<html lang="en">

<head>
	<title>Sensors | Zmeter Production</title>
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
                    <h3 class="page-title">Sensors</h3>
                    </div>

                    <div class="col-md-4" align="center">
                        <form action="sensor.php" method="POST">
                            <div class="input-group">
                                <input type="text" value="" name="item" class="form-control" placeholder="Search (SN, Sale Date, Place)">
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
                    <a href="add_sensor.php"><button type="button" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Sensor</button></a>
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
												<th>Meter S/N</th>
												<th>Sensor S/N</th>
												<th>Type</th>	
												<th>Sale Date</th>
												<th>Warrenty Period</th>
												<th>Warrenty</th>
												<th>Place</th>
												<th>Edit</th>
												<th>Delete</th>
											</tr>
										</thead>
										<tbody>
											<?php echo $sensor_list; ?>
											<?php echo $sensor_search_list; ?>
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
