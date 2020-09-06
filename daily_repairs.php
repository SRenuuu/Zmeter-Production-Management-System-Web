<?php

    require_once('connection.php');
    
    if (isset($_POST['search'])) {
                $count=0;
        $sql="SELECT * FROM dailyrepairs WHERE adddate='{$_POST['item']}' or sn='{$_POST['item']}' or phone='{$_POST['item']}'";
        $result=mysqli_query($conn,$sql);
        if ($result) {
            while ($dailyrepairs=mysqli_fetch_assoc($result)) {
                $count=$count+1;
                $repair_list .="<tr>";
                $repair_list .="<td>".$dailyrepairs['adddate']."</td>";
                $repair_list .="<td>".$dailyrepairs['fixeddate']."</td>";
                $repair_list .="<td>".$dailyrepairs['warrenty']."</td>";
                $repair_list .="<td>".$dailyrepairs['sn']."</td>";
                $repair_list .="<td>".$dailyrepairs['cusname']."</td>";
                $repair_list .="<td>".$dailyrepairs['phone']."</td>";
                $repair_list .="<td>".$dailyrepairs['fault']."</td>";
                $repair_list .="<td>".$dailyrepairs['received']."</td>";

                if ($dailyrepairs['handover'] == 'no') {
                    $repair_list .="<td><a href='dailyrepairs_handover.php?repair_id=".$dailyrepairs['id']."'><span class='label label-danger'><i class='fa fa-handshake-o'></i> Handover</span></a></td>";
                }else{
                    $repair_list .="<td><span class='label label-default'>".$dailyrepairs['handover']."</span></td>";
                }

                $repair_list .="<td>".$dailyrepairs['replacement']."</td>";
                $repair_list .="<td>Rs.".$dailyrepairs['price'].".00</td>";
                $repair_list .="<td><a href='edit_daily_repair.php?repair_id=".$dailyrepairs['id']."'><span class='edit-icon-color lnr lnr-pencil'></span></a></td>";
                $repair_list .="</tr>";
            }
        }

    }else{
        $count=0;
        $sql="SELECT * FROM dailyrepairs";
        $result=mysqli_query($conn,$sql);
        if ($result) {
            while ($dailyrepairs=mysqli_fetch_assoc($result)) {
                $count=$count+1;
                $repair_list .="<tr>";
                $repair_list .="<td>".$dailyrepairs['adddate']."</td>";
                $repair_list .="<td>".$dailyrepairs['fixeddate']."</td>";
                $repair_list .="<td>".$dailyrepairs['warrenty']."</td>";
                $repair_list .="<td>".$dailyrepairs['sn']."</td>";
                $repair_list .="<td>".$dailyrepairs['cusname']."</td>";
                $repair_list .="<td>".$dailyrepairs['phone']."</td>";
                $repair_list .="<td>".$dailyrepairs['fault']."</td>";
                $repair_list .="<td>".$dailyrepairs['received']."</td>";

                if ($dailyrepairs['handover'] == 'no') {
                    $repair_list .="<td><a href='dailyrepairs_handover.php?repair_id=".$dailyrepairs['id']."'><span class='label label-danger'><i class='fa fa-handshake-o'></i> Handover</span></a></td>";
                }else{
                    $repair_list .="<td><span class='label label-default'>".$dailyrepairs['handover']."</span></td>";
                }

                $repair_list .="<td>".$dailyrepairs['replacement']."</td>";
                $repair_list .="<td>Rs.".$dailyrepairs['price'].".00</td>";
                $repair_list .="<td><a href='edit_daily_repair.php?repair_id=".$dailyrepairs['id']."'><span class='edit-icon-color lnr lnr-pencil'></span></a></td>";

                 $repair_list .="<td><a href='remove_daily_repair.php?repair_id=".$dailyrepairs['id']."'><span class='remove-icon-color lnr lnr-trash'></span></a></td>";

                $repair_list .="</tr>";
            }
        }
    }

?>

<!doctype html>
<html lang="en">

<head>
    <title>Daily Repairs | Zmeter Production</title>
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
                    <h3 class="page-title">Daily Repairs</h3>
                    </div>

                    <div class="col-md-4" align="center">
                        <form action="daily_repairs.php" method="POST">
                            <div class="input-group">
                                <input type="text" value="" name="item" class="form-control" placeholder="Search Repair...">
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
                    <a href="add_daily_repair.php"><button type="button" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Repair</button></a>
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
                                                <th>Date</th>
                                                <th>Fixed Date</th>
                                                <th>Warrenty</th>
                                                <th>S/N</th>
                                                <th>Customer</th>
                                                <th>Phone</th>
                                                <th>Fault</th>
                                                <th>Received</th>
                                                <th>Handover</th>
                                                <th>Replacement</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php echo $repair_list; ?>
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
