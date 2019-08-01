<?php 
session_start();
if ( !isset($_SESSION["login"]) ){
  header("Location: login.php");
  exit;
}
require 'function.php';

$events = query("SELECT event.*, customer.customer_name, customer.customer_address, device.device_type, device.device_ip_add FROM event, customer, device WHERE event.customer_id=customer.customer_id AND event.device_id=device.device_id ORDER BY event_id DESC LIMIT 3");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Network Monitoring System | PT Indonesia Comnets Plus</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" href="vendor/iconfonts/mdi/css/materialdesignicons.min.css">
  <script type="text/javascript" src="js/Chart.js"></script>
</head>

<body id="page-top">
  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="index.php">ICON+</a>
    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    <a class="nav-item" href="logout.php">
     <span class="mr-2 d-none d-lg-inline text-gray-600 small">
    </a></form>
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">      
    <a class="nav-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
    <i class="menu-icon mdi mdi-logout"></i>Logout</a></form>
  </nav>

  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Entities</span>
        </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="customer.php">Customer</a>
              <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="pop.php">POP</a>
              <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="device.php">Device</a>
              <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="accounts.php">Admin Page</a>
          </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="detailcust.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Detail Charts</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="tables.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables Event</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="Preconfig/PRECON_">
          <i class="fas fa-fw fa-book"></i>
          <span>Script Template</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="about.php">
          <i class="fas fa-fw fa-info-circle"></i>
          <span>About</span></a>
      </li>
    </ul>

  <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <font face="Consolas" size="3"><strong>MIKROTIK MONITORING SYSTEM IN PT INDONESIA COMNETS PLUS (ICON+)</strong></font>
          </li>
        </ol>

      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-users"></i>
              </div>
                <font face="Consolas" size="6">
                  <?php $con = mysqli_connect("localhost","root","","iconbisa");
                  $query = "SELECT * FROM customer";
                  $results = mysqli_query($con, $query);
                  $jumlah_customer = mysqli_query($con, "select * from customer");
                  echo mysqli_num_rows($jumlah_customer); ?>
                </font>
            </div>
              <a class="card-footer text-white clearfix small z-1" href="customer.php">
                <span class="float-left"><font face="Consolas" size="3"><strong>Total Customer</strong></font></span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-hotel"></i>
              </div>
                <font face="Consolas" size="6">
                  <?php $con = mysqli_connect("localhost","root","","iconbisa");
                  $query = "SELECT * FROM pop";
                  $results = mysqli_query($con, $query);
                  $jumlah_pop = mysqli_query($con, "select * from pop");
                  echo mysqli_num_rows($jumlah_pop); ?>
                </font>
            </div>
              <a class="card-footer text-white clearfix small z-1" href="pop.php">
                <span class="float-left"><font face="Consolas" size="3"><strong>Total POP</strong></font></span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-desktop"></i>
              </div>
                <font face="Consolas" size="6">
                  <?php $con = mysqli_connect("localhost","root","","iconbisa");
                  $query = "SELECT * FROM device";
                  $results = mysqli_query($con, $query);
                  $jumlah_device = mysqli_query($con, "select * from device");
                  echo mysqli_num_rows($jumlah_device); ?>
               </font>
            </div>
                <a class="card-footer text-white clearfix small z-1" href="device.php">
                  <span class="float-left"><font face="Consolas" size="3"><strong>Total Device</strong></font></span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-table"></i>
              </div>
                <font face="Consolas" size="6">
                  <?php $con = mysqli_connect("localhost","root","","iconbisa");
                  $query = "SELECT * FROM event";
                  $results = mysqli_query($con, $query);
                  $jumlah_event = mysqli_query($con, "select * from event");
                  echo mysqli_num_rows($jumlah_event); ?>
                </font>
            </div>
              <a class="card-footer text-white clearfix small z-1" href="tables.php">
                <span class="float-left"><font face="Consolas" size="3"><strong>Total Event</strong></font></span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
          </div>
        </div>
      </div>

      <div class="row">
        
      <div class="col-lg-12">
          <div class="card mb-3">
          <div class="card-header"><center>
            <i class="fas fa-desktop"></i>
              <strong>DEVICE CONDITION</strong></center>
          </div>
            <div class="card-body">
              <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                      <thead>
                        <tr style="background-color: grey">
                          <th><center>
                            Customer ID</center>
                          </th>
                          <th><center>
                            Customer Name</center>
                          </th>
                          <th><center>
                            Customer Address
                          </center></th>
                          <th><center>
                          	Device Type
                          </center></th>
                          <th><center>
                            Device IP
                          </center></th>
                           <th><center>
                            Condition
                          </center></th>
                          <th><center>
                            Last Status
                          </center></th>
                      </thead>
                      <tbody>
                        
                        <?php foreach ($events as $event) : ?>
                        <tr>
                           <td><font face="Courier New" size="3">
                            <?php echo $event["customer_id"]; ?></font>
                          </td>
                          <td><font face="Courier New" size="3">
                            <?php echo $event["customer_name"]; ?></font>
                          </td>
                          <td><font face="Courier New" size="3">
                            <?php echo $event["customer_address"]; ?></font>
                          </td>
                          <td><font face="Courier New" size="3">
                            <?php echo $event["device_type"]; ?></font>
                          </td>
                          <td><font face="Courier New" size="3">
                            <?php echo $event["device_ip_add"]; ?></font>
                          </td>
                          
                              <?php if ($event["p6receive"] < 7) : ?>
                          <td><center>
                            <button type="submit" name="submit" class="btn btn-danger btn-md"><i class="fas fa-exclamation-triangle"></i></button></center>
                          </td>
                          <?php elseif ($event["p6receive"] >= 7) : ?>
                            <td><center>
                            <button type="submit" name="submit" class="btn btn-success btn-md"><i class="fas fa-check-square"></i></button></center></td>
                          <?php endif ?>
                         
                          <td>
                          <form action="status.php" method="POST">
                        <input type="hidden" name="detail_cust" value="<?php echo $event['customer_id']; ?>">
                        <center><button type="submit" name="status" class="btn btn-primary btn-sm"><font face="Courier New" size="2"><strong>Click for detail</strong></font></button></center></form>
                        </td>
                      
                      
                        </tr>
                       <?php endforeach; ?>
                      </tbody>
                    </table>
                     </div>


            </div>                    
        </div>
      </div>
     

      </div>
      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
          	<p>Copyright © </p>
            <a href="http://www.iconpln.co.id"><span>PT Indonesia Comnets Plus</span></a>
          </div>
        </div>
      </footer>

  </div>
  <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

</body>

</html>
